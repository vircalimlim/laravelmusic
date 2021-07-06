<template>
<div>
    <div id="player-content">

        <div class="mt-5">
            <h1 class="">All Songs</h1>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Album</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center"><i class="fas fa-play"></i></td>
                            <td>Some title</td>
                            <td>Some artist</td>
                            <td>Some album</td>
                            <td>3:45</td>
                            <td>delete</td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-play"></i></td>
                            <td>Some title</td>
                            <td>Some artist</td>
                            <td>Some album</td>
                            <td>3:45</td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-play"></i></td>
                            <td>Some title</td>
                            <td>Some artist</td>
                            <td>Some album</td>
                            <td>3:21</td>
                        </tr>
                        <tr v-for="music in musiclist">
                            <td align="center"><i class="fas fa-play"></i></td>
                            <td>{{music.title}}</td>
                            <td>{{music.artist}}</td>
                            <td>{{music.album}}</td>
                            <td>{{music.duration}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        

        </div>


    </div>

<div class="slider">
<form>
    <input type="range" class="form-control-range" id="formControlRange">
</form>
<div class="player d-flex justify-content-center align-items-center">
    <i class="fas fa-backward"></i>
    <i class="fas fa-pause-circle"></i>
    <i class="fas fa-forward"></i>
        
</div>
</div>

</div>
</template>

<script>

  export default{
    props: ['musiclist'],
    
  }
</script>

<style>
#player-content {
    background: #1ed760;
    height: 100vh;
    width: 100%;
    padding: 40px 50px 50px 50px;
    position: relative;
}

.input-group .btn-outline-secondary {
    background: #fff !important;
    border-color: #fff;
}

.input-group .form-control {
    background: #fff !important;
    border-color: #fff !important;
    padding-left: 0;
    outline: none;
}

table {
    background: #c227a0;
    width: 100%;
}

table thead tr th,
table tbody tr td {
    padding: 20px;
    font-size: 18px;
    border: 1px solid #fff;
    color: #fff;
}

table tbody tr td i {
    color: #fff;
    font-size: 28px;
}

.slider {
    position: absolute;
    bottom: 50px;
    width: 100%;
    padding-left: 50px;
    padding-right: 50px;
}

.player i {
    padding: 40px 20px;
    font-size: 50px;
    color: #fff;
    cursor: pointer;
}

.show-sidebar {
    left: 0;
}

#show {
    display: block;
}
#close{
    display: block;
    position: absolute;
    top: 30px;
    left: 30px;
}
.modal-content{
    background: #1ed760 !important;
}
.modal-header{
    background: #fff;
}
.modal-title{
   font-weight: 800;
    font-size: 28px;
    background: #fff;
}
.drag-upload{
    height: 70px;
    width: 100%;
    background: #fff;
}
.create-playlist-input{
    height: 40px;
    width: 100%;
    background: #fff;
    border: none;
}
@media (min-width: 992px) {
    #show {
        display: none;
    }
    #close {
        display: none;
    }

    #sidebar {
        left: 0;
    }

    #player-content {
        padding-left: 320px;
    }

    .slider {
        padding-left: 320px;
    }
}

</style>