<template>
  <div class="hello" style="position:relative; bottom:100px; top:50px;">
    <center>
    <h1> Data Pendaftar Polisi </h1>
    <router-link to="/biodata/create">
    <button type="button" class="btn btn-sm btn-primary " style="position:relative; bottom:10px; right:300px; width:200px"> Daftar </button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" >
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(biodata, i) in data_biodata" :key="i">
          <td>{{ i + 1 }}</td>
          <td>{{ biodata.NIK }}</td>
          <td>{{ biodata.nama_lengkap }}</td>
          <td>{{ biodata.jenis_kelamin }}</td>
          <td>{{ biodata.alamat }}</td>
          <td>
            <router-link :to="'/biodata/' + biodata.id"><button type="button" class="btn btn-sm btn-primary">edit</button></router-link>
            <button @click="deleteRow(biodata.id)" class="btn btn-sm btn-danger">delete</button>
          </td>
        </tr>
    </table>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; top:30px; bottom:10px; right:380px;">back</button>
    </router-link>
  </center>
    <p class="top-right"><b><i>@AgungGunawan</i></b></p>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'Biodata',
  data () {
    return {
      data_biodata: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost:8080/PWD/public/'
      let url2 = 'biodata'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_biodata = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost:8080/PWD/public/biodata/'
      api.delete(url + id).then(res => {
        if (res.data.status === 'success') {
          this.get()
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
