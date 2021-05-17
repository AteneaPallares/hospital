<template>
  <div class="p-2 text-center">
    <div class="col-sm-4 col-lg-2 text-left m-0 p-0">
      <button class="btn btn-info form-button m-3" type="button" @click="ret()">
        <i class="el-icon-s-fold"></i>
      </button>
      <br />
    </div>
    <div class="d-flex flex-column" id="content-wrapper">
      <div class="table">
        <div class="row">
          <div class="col-lg-12 mb-3">
            <div class="card shadow h-100">
              <div class="card-header">
                <h5
                  v-if="number == 0 || number==3"
                  class="text-primary m-0 font-weight-bold"
                >
                  Registro de diagnóstico
                </h5>
                <h5
                  v-if="number == 1"
                  class="text-primary m-0 font-weight-bold"
                >
                  Editar diagnóstico
                </h5>
                <h5
                  v-if="number == 2"
                  class="text-primary m-0 font-weight-bold"
                >
                  Detalles de diagnóstico
                </h5>
              </div>
              <div class="card-body">
                <h5 v-if="number!=0" class="text-primary m-0 font-weight-bold">
                  Información del paciente
                </h5>
                <div class="row" v-if="number != 0">
                  <div class="d-inline col-lg-4">
                    <div>
                      <el-button type="info" @click="go()" plain
                        >Ver paciente</el-button
                      >
                    </div>
                    <br/>
                    <div><img id="pic" class="rounded-circle" height="200" width="200" /></div>
                    <br/>
                    <div>
                      <el-button type="warning" @click="goedit()" plain
                        >Editar paciente</el-button
                      >
                    </div>
                    
                  </div>
                  <div
                    class="d-inline col-lg-8"
                    v-if="
                      this.diagnose != null && this.diagnose.patient != null
                    "
                  >
                    <div class="d-inline col-lg-8 text-left">
                      <div>
                        <label
                          ><strong>Nombre: </strong
                          >{{ this.diagnose.patient.name }}</label
                        >
                      </div>
<div>
                        <label
                          ><strong>Dirección: </strong
                          >{{ this.diagnose.patient.address }}</label
                        >
                      </div>
                      <div>
                        <label
                          ><strong>Teléfono: </strong
                          >{{ this.diagnose.patient.phone }}</label
                        >
                      </div>
                      <div>
                        <label
                          ><strong>Correo: </strong
                          >{{ this.diagnose.patient.email }}</label
                        >
                      </div>
                      <div>
                        <label
                          ><strong>NSS: </strong
                          >{{ this.diagnose.patient.ns }}</label
                        >
                      </div>
                      <div>
                        <label
                          ><strong>Peso: </strong
                          >{{ this.diagnose.patient.weight }}</label
                        >
                      </div>
                      <div>
                        <label
                          ><strong>Altura: </strong
                          >{{ this.diagnose.patient.height }}</label
                        >
                      </div>
                      <div>
                        <label
                          ><strong>Estado: </strong
                          >{{ this.diagnose.patient.status }}</label
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <hr v-if="number!=0" />

                <div class="m-2" v-show="number != 2">
                  <el-button
                    v-if="number ==1"
                    type="success"
                    @click="edit()"
                    plain
                    >Guardar todo</el-button
                  >
                  <el-button v-show="number ==0 ||number==3" type="success" @click="edit()" plain
                    >Registrar diagnóstico</el-button
                  >
                </div>
                <div class="m-2" v-show="number == 2">
                  <el-button type="warning" @click="editLink()" plain
                    >Editar</el-button
                  >
                </div>
                <h5 v-if="number!=0" class="text-primary m-0 font-weight-bold">
                  Información del diagnóstico
                </h5>
                <form>
                  <div class="row">
                    <div class="d-inline col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group">
                        <strong>Paciente</strong
                        ><label class="text-danger" v-if="number != 2">
                          *</label
                        >
                        <div>
                          <el-select
                            style="width: 100%"
                            v-model="paciente"
                            filterable
                            placeholder="Seleccione"
                            :disabled="number == 2 || number==3"
                          >
                            <el-option
                              v-for="item in pacientes"
                              :key="item.id"
                              :label="item.name"
                              :value="item.id"
                            >
                            </el-option>
                          </el-select>
                        </div>
                      </div>
                    </div>
                    <div class="d-inline col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group">
                        <strong>Doctor </strong
                        ><label class="text-danger" v-if="number != 2">
                          *</label
                        >
                        <div>
                          <el-select
                            style="width: 100%"
                            v-model="doctor"
                            filterable
                            placeholder="Seleccione"
                            :disabled="number == 2"
                          >
                            <el-option
                              v-for="item in doctores"
                              :key="item.id"
                              :label="item.name"
                              :value="item.id"
                            >
                            </el-option>
                          </el-select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group purple-border">
                    <strong>Enfermedad</strong>
                    <br />
                    <textarea
                      :readonly="number == 2"
                      class="form-control"
                      id="exampleFormControlTextarea4"
                      rows="4"
                      v-model="diagnose.disease"
                    ></textarea>
                  </div>
                  <div class="form-group purple-border">
                    <strong>Descripción</strong>
                    <br />
                    <textarea
                      :readonly="number == 2"
                      class="form-control"
                      id="exampleFormControlTextarea4"
                      rows="8"
                      v-model="diagnose.description"
                    ></textarea>
                  </div>
                  <div class="form-group purple-border">
                    <strong>Tratamiento</strong>
                    <br />
                    <textarea
                      :readonly="number == 2"
                      class="form-control"
                      id="exampleFormControlTextarea4"
                      rows="8"
                      v-model="diagnose.drugs"
                    ></textarea>
                  </div>
                  <div class="form-group purple-border">
                    <strong>Notas</strong>
                    <br />
                    <textarea
                      :readonly="number == 2"
                      class="form-control"
                      id="exampleFormControlTextarea4"
                      rows="5"
                      v-model="diagnose.notes"
                    ></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["number", "detailsid"],
  data() {
    return {
      showId: [],
      response: [],
      editAvailable: false,
      editid: this.detailsid,
      paciente: null,
      doctor: null,
      pacientes: [],
      doctores: [],
      loggeduser: [],
      diagnose: {
        id: null,
        id_patient: null,
        id_doctor: null,
        disease: null,
        description: null,
        weight: null,
        notes: null,
        drugs: null,
      },
    };
  },
  mounted() {
    axios.get("/pacientes/all").then((response) => {
      this.pacientes = response.data;
      console.log(response.data);
    });
    axios.get("/usuarios/all").then((response) => {
      this.doctores = response.data;
      console.log(response.data);
    });
    axios.get("/usuarios/actual").then((response) => {
      this.loggeduser = response.data;
      console.log(response.data);
      this.doctor = this.loggeduser.id;
      console.log(this.doctor);
    });
if (this.number==3) {
      axios.get(`/pacientes/detalleone/${this.editid}`).then((response) => {
        this.diagnose.patient = response.data;
        
        if (this.diagnose.patient.image == null) {
          document.getElementById("pic").src = "../../../../storage/drop.png";
        } else {
          document.getElementById("pic").src =
            "../../../../storage/" + this.diagnose.patient.image;
        }
        this.paciente = this.editid;
      });
    }
    if (this.number != 0 && this.number!=3) {
      axios.get(`/historiales/detalleone/${this.editid}`).then((response) => {
        this.diagnose = response.data;
        
        if (this.diagnose.patient.image == null) {
          document.getElementById("pic").src = "../../../../storage/drop.png";
        } else {
          document.getElementById("pic").src =
            "../../../../storage/" + this.diagnose.patient.image;
        }
        this.doctor = this.diagnose.id_doctor;
        this.paciente = this.diagnose.id_patient;
        
        console.log(this.diagnose);
      });
    }
  },
  methods: {
    edit() {
      if (this.doctor == null || this.paciente == null) {
        this.showErrorNotification(
          "Registrar diagnóstico",
          "Ingrese los campos requeridos"
        );
        return;
      }
      this.diagnose.id_patient = this.paciente;
      this.diagnose.id_doctor = this.doctor;
      axios.post("/historiales", this.diagnose).then((response) => {
        if (_.isNumber(response.data.response)) {
          this.editid = response.data.response;
          this.showSuccessNotification(
            "Agregando diagnóstico",
            "Información guardada con éxito"
          );
        } else {
          this.showErrorNotification("Agregando diagnóstico", response.data);
          return;
        }
      });
    },
    showSuccessNotification(title, text) {
      this.$notify({
        title: title,
        message: text,
        type: "success",
      });
    },
    showErrorNotification(title, text) {
      this.$notify({
        title: title,
        message: text,
        type: "error",
      });
    },
    editLink() {
      window.location = "/historiales/editar/" + this.editid;
    },
    ret() {
      window.location = "/historiales";
    },
    addShow() {
      this.show = true;
    },
    showchange() {
      console.log(this.patient);
    },
    go() {
      window.location = "/pacientes/detalle/" + this.diagnose.patient.id;
    },
    goedit() {
      window.location = "/pacientes/editar/" + this.diagnose.patient.id;
    },
  },
};
</script>
<style scoped>
.lbl {
  border: 0;
  outline: 0;
  width: 100%;
  border-bottom: 1px solid black;
}
.dragging {
  opacity: 0.3;
}
label.label input[type="file"] {
  position: absolute;
  top: -1000px;
}
label.label input[type="button"] {
  position: absolute;
  top: -1000px;
}
.label {
  cursor: pointer;
  border: 1px solid #cccccc;
  border-radius: 5px;
  padding: 5px 15px;
  background: white;
  display: inline-block;
}
.label:hover {
  background: rgb(202, 201, 201);
}
.label:active {
  background: #9fa1a0;
}
.label:invalid + span {
  color: #000000;
}
.label:valid + span {
  color: #ffffff;
}
</style>
