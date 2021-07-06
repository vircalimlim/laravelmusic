<template>
  <div>
  
  <button @click="closeModal" class="mr-1 ml-4 btn btn-success">Edit</button>
  
  <div v-show="hide" @click.self="closeModal" class="overlay">
    <div @click.self="closeModal" class=" text-center row justify-content-center">
      <div class="bg-light col-10 col-md-6">
        
        <form @submit.prevent="updateData" method="POST" :action="'/playlist/' + id">
        <input type="hidden" name="_token" :value="csrf">
        
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Edit Playlist</h5>
           <button @click="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
          <div class="modal-body">
            <input placeholder="Edit Playlist" v-model="name" class="form-control" type="text" >

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
    mounted(){
      //alert(this.list.id)
    },
    
    data(){
      return{
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        hide: false,
        list: JSON.parse(this.playlist),
        name: JSON.parse(this.playlist).name,
      }
    },
    
    props: ['id', 'playlist'],
    
    methods:{
      closeModal(){
        this.hide = !this.hide
        //this.$emit('modal', this.hide)
      },
      
      updateData(){
        axios.patch('/playlist/' + this.id, {
          name: this.name
        })
        .then(res => {
          alert(res.data)
        })
        
        window.location.href = '/playlist/' + this.id
      }
      
    }
  }
</script>