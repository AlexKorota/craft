<style scoped>
    .slug-widget{
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    .wrapper{
        margin-left: 5px;
    }
    .slug{
        background-color: yellow;
        padding: 3px 5px;
    }
    .button{
        background-color: white;
    }


</style>

<template>
    <div class="slug-widget">
        <div class="icon-wrapper wrapper">
            <i class="fa fa-link"></i>
        </div>
        <div class="url-wrapper wrapper">
            <span class="root-utl">{{url}}</span
            ><span class="subdirectory-url">/{{subdirectory}}/</span
            ><span class="slug" v-show="slug && !isEditing">{{slug}}</span
        ><span class="slug-edit" v-show="isEditing"><input type="text" name="slug" v-model="customSlug"/></span>
        </div>

        <div class="button-wrapper wrapper">
            <button class="save-slug-button button is-small" v-show="!isEditing" @click.prevent="editSlug">Редактировать</button>
            <button class="save-slug-button button is-small" v-show="isEditing"  @click.prevent="saveSlug">Сохранить</button>
            <button class="save-slug-button button is-small" v-show="isEditing"  @click.prevent="resetSlug">Сбросить</button>
        </div>
    </div>
</template>

<script>
    import * as _ from "lodash";

    export default {
        props:{
          url: {
              type: String,
              required: true
          },
          subdirectory: {
              type: String,
              required: true
          },
          title: {
              type: String,
              required: true
          }
        },
        data: function() {
           return {
               slug: this.convertTitle(),
               isEditing: false,
               customSlug: '',
               wasEdited: false
           }
        },
        methods: {
            convertTitle: function() {
                return Slug(this.title)
            },
            editSlug: function() {
                this.customSlug = this.slug;
                this.$emit('edit', this.slug);
                this.isEditing = true;
            },
            saveSlug: function() {
//                run ajax to see if new slug is unique
                if(this.customSlug !== this.slug) this.wasEdited = true;
                this.slug = Slug(this.customSlug);
                this.$emit('save', this.slug);
                this.isEditing = false;
            },

            resetSlug: function(){
                this.slug = this.convertTitle();
                this.$emit('reset', this.slug);
                this.isEditing = false;
                this.wasEdited = false;
            }
        },
        watch: {
            title: _.debounce(function(){
                if(this.wasEdited == false) this.slug = this.convertTitle()
                //run ajax to see if slug is unique and if not, customize it to make unique
                }, 500),
            slug: function (val) {
                this.$emit('slug-changed', this.slug)
            }
        }
    }
</script>
