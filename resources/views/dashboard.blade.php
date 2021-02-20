@extends('layouts.panel')

@section('leftNav')
    @include('layouts.components.opcionsLoginNav')
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-perfil-tab">
                @include('layouts.components.UserPerfil.userPerfil')
            </div>
            @if (auth()->user()->admin == 1)
                <div class="tab-pane fade" id="v-pills-news" role="tabpanel" aria-labelledby="v-pills-news-tab">
                    @include('layouts.components.newaEditorNav')
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="crear" role="tabpanel" aria-labelledby="crear-tab">
                            @include('layouts.components.NoticiasPanel.addNews')
                        </div>
                        <div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
                            @include('layouts.components.NoticiasPanel.deleteNews')
                        </div>
                        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                            @include('layouts.components.NoticiasPanel.editNews')
                        </div>
                        <div class="tab-pane fade" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">
                            @include('layouts.components.NoticiasPanel.categoriasManager')
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    @include('layouts.components.bandejaEmail')
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="emailEntrada" role="tabpanel"
                            aria-labelledby="emailEntrada-tab">
                            @include('layouts.components.Messages.mensajes')
                        </div>
                    </div>
                </div>
            @endif
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                @include('layouts.components.SettingsPanel.changePassword')
            </div>
            <div class="tab-pane fade" id="v-pills-connexion" role="tabpanel" aria-labelledby="v-pills-connexion-tab">
                @include('layouts.components.ConnexionesPanel.connexiones')
            </div>
        </div>
    </div>
@endsection
