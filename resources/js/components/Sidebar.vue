<template>
<div>
  <transition name="fade-nav">
 <div id="sidebar" v-if="show" class="sidebar">
       <i id="close" @click="toggleMenu"  class="d-inline fas fa-times"></i>
        <div>
            <img src="https://uxwing.com/wp-content/themes/uxwing/download/10-brands-and-social-media/spotify.png" class="img-responsive">
        </div>
        <div @click="openModal('upload')">
            <a data-toggle="modal" data-target="#upload">Upload Music</a>
        </div>
        <div>
            <a href="/">All Songs</a>
        </div>
        <div @click="openModal('playlist')" class="my-3">
            <a data-toggle="modal" data-target="#playlist">Create Playlist</a>
        </div>

        <div class="m-0 p-0" v-for="list in datalist">
          <a :href="'playlist/'+list.id">{{list.name}}</a>
        </div>

    </div>
    
    </transition>
    
    <div class="d-flex align-items-center bg-success py-2">
       <i id="show" @click.self="toggleMenu" class="d-inline px-3  fas fa-bars fa-3x" style="color:#fff;"></i>
       
        <div class="px-3 input-group px-0 py-3 col-5">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
            </div>
            <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        </div>

        <transition name="modal-pop">
        <Modal :modaltype="modaltype"  v-if="modalclose" @modal="closeModal" @upload="uploadMusic" @playlist="submitList"></Modal>
        </transition>
        
        <Playercontent :musiclist="musiclist"></Playercontent>

</div>
</template>

<script>
import Modal from './Modal.vue'
import Playercontent from './Playercontent.vue'
  export default{
    components:{
      Modal,
      Playercontent
    },
    
    mounted(){
      this.showData()
      this.showMusic()
    },
    
    data(){
      return{
        show: false,
        modalclose: false,
        modaltype: '',
        datalist: [],
        musiclist: []
      }
    },
    
    methods:{
      showData(){
        axios.get('/playlist')
        .then(res => {
          this.datalist = res.data
        })
      },
      
      showMusic(){
        axios.get('/song')
        .then(res => {
          this.musiclist = res.data
        })
      },
      
      toggleMenu(){
        this.show = !this.show
      },
      
      closeModal(value){
        this.modalclose = value
      },
      openModal(data){
        this.modaltype = data
        this.modalclose = !this.modalclose
      },
      submitList(){
        this.showData()
      },
      
      uploadMusic(){
        //this.musiclist.push(value)
        //alert(this.musiclist)
        this.showMusic()
      }
    }
  }
</script>

<style>
.sidebar {
    height: 100vh;
    width: 280px;
    background: #c227a0;
    position: fixed;
    top: 0;
    z-index: 111;
    lesft: -320px;
}

#sidebar div img {
    width: 230px;
    padding: 50px;
}

#sidebar div a {
    display: block;
    color: #fff;
    margin-left: 50px;
    font-size: 18px;
    padding: 10px;
    cursor: pointer;

}

.fade-nav-enter-from, .fade-nav-leave-to{
  opacity: 0;
  transform: translateX(-115px);
}
.fade-nav-enter-active, .fade-nav-leave-active{
  transition: all .5s ease;
}

.modal-pop-enter-from, .modal-pop-leave-to{
  opacity: 0;
}
.modal-pop-enter-active, .modal-pop-leave-active{
  transition: all .5s ease;
}
</style>