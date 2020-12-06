<template>
  <div class="login">
    <div class="login__container">
        <h3 class="text-center text-white">Welcome</h3>
        <p class="login__slogan mb-5"><span class=""><</span> Kevin Rangel <span class="">/></span> </p>
        <form v-on:submit.prevent="login">
            <input v-model="email" type="text" placeholder="Email" class="login__input mb-5"/>

            <input v-model="password" type="password" placeholder="Password" class="login__input mb-5"/>

            <button class="login__btn" type="submit">Login</button>
        </form>
    </div>
  </div>
</template>

<script>
import Preloader from '../components/ui/Preloader'
export default {
  data() {
    return {
      email: null,
      password: null
    };
  },
  methods: {
    login() {
      const params = {
        email: this.email,
        password: this.password
      }
      this.$preloaders.open({component: Preloader})
      let request = this.$axios.$post("api/login", params);
      request.then(res => {
        console.log(res);
        this.$router.push('/dashboard')
        this.$preloaders.close({ transition: 'preloaders' });
      })
       .catch(err => {
         this.$preloaders.close({ transition: 'preloaders' });
       })
    },
  },
  mounted() {
  }
};
</script>

<style scoped>
.login {
  height: 100vh;
  background-color: #000;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.login__container {
  width: 30%;
  height: auto;
  background: #171510;
  flex-direction: column;
  padding: 40px 40px 20px 40px;
  border: 1px solid #f1f1f1;
  border-radius: 20px;
}
.login__slogan {
  color: gold;
  text-align: center;
  font-size: 24px;
}
.login__container > form {
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.login__input {
  display: block;
  width: 100%;
  border: none;
  border-bottom: 2px solid gold;
  margin-bottom: 20px;
  background: none;
  outline: none;
  color: gold;
}
.login__input::placeholder {
  color: white;
  margin-bottom: 10px;
}
.login__btn {
  background-color: gold;
  color: #111;
  border-radius: 20px;
  width: 100%;
  padding: 7px 0;
  border: none;
  font-weight: 500;
  outline: none;
}
</style>
