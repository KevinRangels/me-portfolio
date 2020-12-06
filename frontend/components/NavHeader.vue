<template>
  <div class="nav_header pr-4">
    <div class="nav_header_container mt-1">
      <ul class="m-0" style="list-style: none; display: flex; justify-content: space-between;">
        
          <a href="https://www.instagram.com/kevinrangels/" class="nav_header_btn fab fa-instagram lead"  target="_blank">
          </a>
        

          <a href="https://www.facebook.com/kevin.rangels" class="nav_header_btn fab fa-facebook-f  " target="_blank" >
          </a>
        

          <a href="https://github.com/KevinRangels" class="nav_header_btn fab fa-github " target="_blank" >
          </a>
        
        <li class="text-white ml-4 mt-2">
          <a href="" class="header_menu_btn_lenguage">es</a> <span class="nav_header_btn_lenguage_div">|</span><a href="" class="header_menu_btn_lenguage">en</a>
        </li>

      </ul>      
    </div>

  </div>
</template>

<script>
export default {
  name: 'NavHeader',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .nav_header{
    height: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .nav_header_container{
    display: flex;
    justify-content: flex-end;
  }
  .nav_header_btn{
    border: 2px solid white;
    width: 45px;
    text-align: center;
    display: flex;
    justify-content: center;
    margin-right: 10px;
    margin-left: 10px;
    padding: 7px;
    border-radius: 198px 198px 198px 198px;
    transition: 0.5s;
    color: white;
    transition: 0.8s;
    font-size: 26px;
  }
  .nav_header_btn:hover{
    border: 2px solid gold;
    color: black;
    background: gold;
  }
 .header_menu_btn_lenguage{
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 18px;
    transition: 0.5s;
  }
  .header_menu_btn_lenguage:hover{
    color: gold;
    font-size: 20px;
  }
  .nav_header_btn_lenguage_div{
    margin-right: 5px;
    font-size: 18px;
    font-weight: bold;
  }
  @media (min-width:320px) and (max-width:520px){
    .nav_header_btn{
      display: none;
    }
  }



</style>
