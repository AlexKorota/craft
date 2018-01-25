@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">Создание нового разрешения</h1>
            </div>
        </div>
        <hr>

        <div class="columns">
            <div class="column">
                <form action="{{route('permissions.store')}}" method="POST">
                    {{csrf_field()}}

                    <div class="block">
                        {{--<b-radio-group v-model="permissionType">--}}
                            <b-radio name="permission_type" v-model="permissionType" native-value="basic">Базовые разрешения</b-radio>
                            <b-radio name="permission_type" v-model="permissionType" native-value="crud">CRUD разрешения</b-radio>
                        {{--</b-radio-group>--}}
                    </div>
                    <div class="columns">
                        <div class="column is-one-third">
                            <div class="field" v-if="permissionType == 'basic'">
                                <label for="display_name" class="label">Название</label>
                                <p class="control">
                                    <input type="text" class="input" name="display_name" id="display_name">
                                </p>
                            </div>

                            <div class="field" v-if="permissionType == 'basic'">
                                <label for="name" class="label">Slug</label>
                                <p class="control">
                                    <input type="text" class="input" name="name" id="name">
                                </p>
                            </div>

                            <div class="field" v-if="permissionType == 'basic'">
                                <label for="description" class="label">Описание</label>
                                <p class="control">
                                    <input type="text" class="input" name="description" id="description" placeholder="Описание права, которое дает это разрешение">
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="columns">
                        <div class="column is-one-third">
                            <div class="field" v-if="permissionType == 'crud'">
                                <label for="resource" class="label">Ресурс</label>
                                <p class="control">
                                    <input type="text" class="input" name="resource" id="resource" v-model="resource" placeholder="Название ресурса (user, post, etc.)">
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="columns" v-if="permissionType == 'crud'">
                        <div class="column">
                            {{--<b-checkbox-group v-model="crudSelected">--}}
                                <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="create">Create</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="read">Read</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="update">Update</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="delete">Delete</b-checkbox>
                                </div>
                            {{--</b-checkbox-group>--}}
                        </div>  <!--end of column-->

                        <input type="hidden" name="crud_selected" :value="crudSelected">

                        <div class="column">
                            <table class="table">
                                <thead>
                                    <th>Название</th>
                                    <th>Slug</th>
                                    <th>Описание</th>
                                </thead>
                                <tbody v-if="resource.length >= 3">
                                    <tr v-for="item in crudSelected">
                                        <td v-text="crudName(item)"></td>
                                        <td v-text="crudSlug(item)"></td>
                                        <td v-text="crudDescription(item)"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <button class="button is-warning">Создать новое разрешение</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
              permissionType: 'basic',
              resource: '',
              crudSelected: ['create', 'read', 'update', 'delete']
            },
            methods: {
                crudName: function (item) {
                    return item.substr(0,1).toUpperCase() + item .substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function (item) {
                    return item.toLowerCase() + "-" + app.resource.toLowerCase();
                },
                crudDescription: function (item) {
                    return "Позволяет пользователю " + item.toUpperCase()+ " " + app.resource.substr(0,1).toUpperCase()  + app.resource.substr(1);
                },
            }
        });
    </script>
@endsection
