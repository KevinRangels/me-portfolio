<template>
  <div class="dashboardProfile">
    <div class="dashboardProfile__content">
      <h3>Profile</h3>
      <form class="dashboardProfile__form mt-5" v-on:submit.prevent="updatedProfile">
          <div class="dashboardProfile__contentInput">
            <label for="profile_avatar" class="dashboardProfile__inputAvatar mx-auto">
              <img v-if="data.avatar !== null" :src='"http://127.0.0.1:8000/images/profiles/"+data.avatar' alt="" class="img-fluid">
            </label>
            <input id="profile_avatar" ref="file_avatar" type="file" @change="handlePhotoUpload" class="dashboardProfile__input d-none"/>
          </div>
          <div class="dashboardProfile__contentInput">
            <p>Name</p>
            <input v-model="name"  type="text" placeholder="Enter name" class="dashboardProfile__input"/>
          </div>
          <div class="dashboardProfile__contentInput">
            <p>Age</p>
            <input v-model="age" type="text" placeholder="Enter age" class="dashboardProfile__input"/>
          </div>
          <div class="dashboardProfile__contentInput">
            <p>Number Phone</p>
            <input v-model="phone" type="text" placeholder="Enter phone" class="dashboardProfile__input"/>
          </div>
          <div class="dashboardProfile__contentInput">
            <p>Studies</p>
            <input v-model="studies" type="text" placeholder="Enter studies" class="dashboardProfile__input"/>
          </div>
          <div class="dashboardProfile__contentInput">
            <p>Location</p>
            <input v-model="location" type="text" placeholder="Enter location" class="dashboardProfile__input"/>
          </div>
          <div class="dashboardProfile__contentInput">
            <p>Email</p>
            <input v-model="email" type="text" placeholder="Enter email" class="dashboardProfile__input"/>
          </div>
          <div class="dashboardProfile__contentInput">
            <p>About me</p>
            <textarea v-model="aboutme" class="dashboardProfile__contentInput-textarea"  cols="20" rows="5"></textarea>
          </div>
          <div class="dashboardProfile__contentInput  d-flex flex-column justify-content-center ">
            <p>CV</p>
              <label class="dashboard__mainBtn w-75 text-center" for="profile_cv">Update CV</label>
            <input id="profile_cv" type="file" @change="cv_file" class="dashboardProfile__input d-none"/>
          </div>
          <div class="w-100 d-flex justify-content-end ">
            <button class="dashboard__mainBtn" type="submit">Save</button>
          </div>
      </form>
    </div>
  </div>
</template>

<script>
import Preloader from '../../../components/ui/Preloader'
export default {
  name: "dashboardProfile",
  props: ['data'],
  data() {
    return {
     name: null,
     email: null,
     age: null,
     phone: null,
     studies: null,
     location: null,
     cv: null,
     avatar: null
    };
  },
  methods: {
    handlePhotoUpload () {
      console.log(this.avatar)
      this.avatar = this.$refs.file_avatar.files[0]
      this.updatedAvatar()
    },
    updatedAvatar () {
      const formData = new FormData()
      formData.append('photo', this.avatar)
      this.$preloaders.open({component: Preloader})
      let request = this.$axios.$post(`api/user-updated-photo/${this.data.id}`, formData);
      request.then(res => {
        console.log(res)
        this.$preloaders.close({ transition: 'preloaders' });
      });
    },
      updatedProfile(){
        let params = {
            name: this.name,
            email: this.email,
            age: this.age,
            phone: this.phone,
            studies: this.studies,
            aboutme: this.aboutme
        }
        if(this.avatar !== null){
            params = { ...params, cv: this.avatar };
        }
        if(this.cv !== null){
            params = { ...params, cv: this.cv };
        }
        console.log('param', params)
        this.$preloaders.open({component: Preloader})
        let request = this.$axios.$put(`api/user/${4}`, params);
        request.then(res => {
            console.log(res)
            this.$preloaders.close({ transition: 'preloaders' });
        });
      }
  },
  watch:{
      data(newValue){
          this.name = newValue.name
          this.email = newValue.email
          this.age = newValue.age
          this.phone = newValue.phone
          this.studies= newValue.studies
          this.location= newValue.location
          this.aboutme = newValue.aboutme
          this.cv= newValue.cv
          this.avatar = newValue.avatar
      }
  }
};
</script>

<style lang="scss" scoped>
.dashboard__mainBtn{
    background-color: gold;
    color: #111;
    border-radius: 20px;
    padding: 7px 30px;
    border: none;
    font-weight: 500;
}
.dashboardProfile {
  padding: 20px;
}
.dashboardProfile__content {
  background-color: #000;
  padding: 15px;
  border-radius: 8px;
}
.dashboardProfile__content h3 {
  color: #fff;
  font-size: 34px;
}
.dashboardProfile__form{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.dashboardProfile__contentInput{
    width: 33%;
    padding: 0 20px;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.dashboardProfile__contentInput p{
    color: #fff;
    margin-bottom: 20px;
}
.dashboardProfile__input{
    display: block;
    width: 100%;
    border: none;
    border-bottom: 2px solid gold;
    margin-bottom: 20px;
    background: none;
    outline: none;
    color: gold;
}
.dashboardProfile__inputAvatar{
    cursor: pointer;
    display: block;
    width: 50%;
    border: none;
    border: 2px solid gold;
    background: none;
    outline: none;
    color: gold;
    height: 130px;
    border-radius: 100%;
}
.dashboardProfile__contentInput-textarea{
    display: block;
    border-radius: 8px;
    width: 100%;
    border: 2px solid gold;
    margin-bottom: 20px;
    background: none;
    outline: none;
    color: gold;
    padding: 4px;
}
</style>
