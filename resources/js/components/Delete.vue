<template>
  <div>
    <button type="button" @click="deleteMusic" class="btn text-light">
      Delete
    </button>
  </div>
</template>

<script>
  export default{
    props: ['id', 'songid'],
    
    data(){
      return{
        
      }
    },
    
    methods:{
      deleteMusic(){
        //alert(this.id)
        axios.delete('/playlistsong/' + this.id + '/delete/' + this.songid)
        .then(res => {
          //alert(res.data)
          window.location.href = '/playlist/' + this.id
        })
      }
    }
  }
</script>