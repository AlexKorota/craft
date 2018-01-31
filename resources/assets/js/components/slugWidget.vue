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
               slug: this.setSlug(this.title),
               isEditing: false,
               customSlug: '',
               wasEdited: false,
               api_token: this.$root.api_token
           }
        },
        methods: {
            editSlug: function() {
                this.customSlug = this.slug;
                this.$emit('edit', this.slug);
                this.isEditing = true;
            },
            saveSlug: function() {
//                run ajax to see if new slug is unique
                if(this.customSlug !== this.slug) this.wasEdited = true;
                this.setSlug(this.customSlug);
                this.$emit('save', this.slug);
                this.isEditing = false;
            },

            resetSlug: function(){
                this.setSlug(this.title);
                this.$emit('reset', this.slug);
                this.isEditing = false;
                this.wasEdited = false;
            },
            setSlug: function(newVal, count = 0){
                let slug = Slug(newVal + (count > 0 ? `-${count}` : ''));
                let vm = this;

                if(this.api_token && slug){
                    //test to see if slug is unique
                    axios.get('/api/posts/unique', {
                        params: {
                            api_token: vm.api_token,
                            slug: slug,
                        }
                    }).then(function(responce) {
                        if(responce.data) {
                            vm.slug = slug;
                            vm.$emit('slug-changed', slug)
                        } else {
                            vm.setSlug(newVal, count+1)
                        }

                    }).catch(function (error) {
                        console.log(error);
                    })
                }
            }
        },
        watch: {
            title: _.debounce(function(){
                if(this.wasEdited == false) this.setSlug(this.title);
                //run ajax to see if slug is unique and if not, customize it to make unique
                }, 500),
        }
    }
</script>
