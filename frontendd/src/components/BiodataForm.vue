<template>
  <div class="hello" style="position:relative; bottom:60px">
    <center>
    <router-link to="/biodata">
    <button type="button" class="btn btn-md btn-primary" style="position:relative; top:50px; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2> Sekilas Biodata </h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey; position:relative; top:60px;" >
      <tr>
        <td><label>NIK </label></td>
        <td><input type="text" v-model="biodata.NIK"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Nama Lengkap </label></td>
        <td><input type="text"  v-model="biodata.nama_lengkap" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Jenis Kelamin </label></td>
        <td><input type="text" v-model="biodata.jenis_kelamin" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Alamat </label></td>
        <td><input type="text" v-model="biodata.alamat" class="form-control" required></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-lg btn-info" style="position:relative; top:80px; left:360px;">Daftar</button>
    </form>
    </center>
    <p style="color:grey; font-size:20px;"></p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;"></p>
    <p class="top-right"><b><i>@AgungGunawan</i></b></p>
  </div>
</template>
<script>
import {api} from '@/helper/api'

export default {
  name: 'BiodataForm',
  data () {
    return {
      biodata: {
        id: null,
        NIK: '',
        nama_lengkap: '',
        jenis_kelamin: '',
        alamat: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:8080/PWD/public/biodata/'
      api.get(url + id).then(res => {
        this.biodata = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.biodata
      let url = 'http://localhost:8080/PWD/public/biodata'

      if (this.biodata.id) {
        url += '/' + this.biodata.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/biodata')
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>
