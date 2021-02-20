<div class="col-3 border-right">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active border-bottom" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
            role="tab" aria-controls="v-pills-home" aria-selected="true">Perfil</a>
        @can('admin')
            <a class="nav-link border-bottom" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
            <a class="nav-link  border-bottom" id="v-pills-news-tab" data-toggle="pill" href="#v-pills-news" role="tab"
                aria-controls="v-pills-news" aria-selected="false">Noticias Panel</a>
        @endcan
        <a class="nav-link border-bottom" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
            role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
        <a class="nav-link border-bottom" id="v-pills-connexion-tab" data-toggle="pill" href="#v-pills-connexion"
            role="tab" aria-controls="v-pills-connexion" aria-selected="false">Connexiones</a>
    </div>
</div>
