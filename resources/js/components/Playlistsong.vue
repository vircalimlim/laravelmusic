<template>
  <div>
    <button @click="closeModal" class="btn btn-light my-3">Add Songs</button>
    
  <div v-show="hide" @click.self="closeModal" class="overlay">
    <div @click.self="closeModal" class=" text-center row justify-content-center">
      <div class="bg-light col-12 col-md-10">
        
        <form @submit.prevent="addSong" method="POST">
        <input type="hidden" name="_token" :value="csrf">
        
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Add songs to playlist</h5>
           <button @click="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
          <div class="modal-body">
            
            <div class="form-group row align-items-center">
              <div class="col my-1"> 

                <table class="table text-light table-stripe">   
                <tr>
                  <th>Select</th>
                  <th>Title</th>
                  <th>Artist</th>
                  <th>Duration</th>
                </tr>
                <tr v-for="song in listsong">
                  <td><input type="checkbox" class="" v-model="selectedsong" :value="song.id">
                  </td>
                  <td>{{song.title}}</td>
                  <td>{{song.artist}}</td>
                  <td>{{song.length}}</td>
                </tr>
                
                </table>
              
              </div>
            </div>

          </div>
          <div class="modal-footer"> <button @click="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button> 
            
        </div>
        </form>

      </div>
    </div>
  </div>
    
  </div>
</template>

<script>
  export default{
    data(){
      return{
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        hide: false,
        listsong: JSON.parse(this.songs),
        selectedsong: [],
      }
    },
    
    props: ['songs', 'id'],
    
    methods:{
      closeModal(){
        this.hide = !this.hide
        //this.$emit('modal', this.hide)
      },
      
      addSong(){
        //alert(this.selectedsong)
        axios.post('/playlistsong/' + this.id, {
          song_id: this.selectedsong,
          playlist_id: this.id
        })
        .then(res => {
          //alert(res.data)
          this.selectedsong = ''
          window.location.href = '/playlist/' + this.id
          
        })
      }
    }
  }
</script>