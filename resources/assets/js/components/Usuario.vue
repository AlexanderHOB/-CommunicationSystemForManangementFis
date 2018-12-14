<style scoped>
    .largo{
        overflow-y:scroll;
    }
    .horizontal{
        overflow-x:scroll;
    }
</style>
<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card ">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Usuario
                        <button type="button" @click="abrirModal('persona','registrar')" class="btn btn-secondary" >
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body table-responsive-lg">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarPersona(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary" @click="listarPersona(1,buscar,criterio)"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-lg horizontal">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                        <th>cargo</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="persona in arrayPersona" :key="persona.id">
                                        <td>
                                            <button type="button" @click="abrirModal('persona','actualizar',persona)" class="btn btn-warning btn-sm">
                                            <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            <template v-if="persona.condicion">
                                                <button type="button" class="btn btn-danger btn-sm" @click="desactivarPersona(persona.id)">
                                                <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                            <template v-else>
                                                <button type="button" class="btn btn-info btn-sm" @click="activarPersona(persona.id)">
                                                <i class="icon-check"></i>
                                                </button>
                                            </template>
                                        </td>
                                        <td v-text="persona.nombre"></td>
                                        <td v-text="persona.email"></td>
                                        <td v-text="persona.celular"></td>
                                        <td v-text="persona.usuario"></td>
                                        <td v-text="persona.nombre_rol"></td>
                                        <td v-text="persona.nombre_cargo"></td>
                                        <td>
                                            <div v-if="persona.condicion">
                                                <span class="badge badge-success">Activo</span>
                                            </div>
                                            <div v-else>
                                                <span class="badge badge-danger">Desactivado</span>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>  
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade largo"  tabindex="-1" :class="{'mostrar':modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre"  class="form-control" placeholder="Ejemplo : Alexander Rojas ">
                                        <span class="help-block">(*) Ingrese Nombres</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Ingrese Email</label>
                                    <div class="col-md-9">
                                        <input type="email" v-model="email" class="form-control" placeholder="Ejemplo: fis@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Ingrese Celular</label>
                                    <div class="col-md-9">
                                        <input type="tel" v-model="celular" class="form-control" placeholder="Ejemplo: 940124578">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Rol (*)</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="idrol">
                                            <option value="0" disabled>Seleccione un Rol</option>
                                            <option v-for="rol in arrayRol" :key="rol.id" :value="rol.id" v-text="rol.nombre">

                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Cargo (*)</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="idcargo">
                                            <option value="0" disabled>Seleccione un Cargo</option>
                                            <option v-for="cargo in arrayCargo" :key="cargo.id" :value="cargo.id" v-text="cargo.nombre">

                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Usuario (*)</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="usuario" class="form-control" placeholder="Ejemplo: username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Password (*)</label>
                                    <div class="col-md-9">
                                        <input type="password" v-model="password" class="form-control" placeholder="Ejemplo: ********">
                                    </div>
                                </div>
                                <div v-show="errorPersona" class="form-group row div-error">
                                    <div class="text-center text-error row">
                                        <div v-for="error in errorMostrarMsjPersona" :key="error" v-text="error" class="col-6">
                                        </div>
                                    </div>  
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarPersona()">Guardar</button>
                            <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarPersona()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>
</template>

<script>
    export default {
        data(){
            return{
                persona_id:0,
                nombre:'',
                email:'',
                celular:'',
                usuario:'',
                password:'',
                idrol:0,
                idcargo:0,
                arrayPersona:[],
                arrayRol:[],
                arrayCargo:[],
                modal:0,
                tituloModal:'',
                tipoAccion:0,
                errorPersona:0,
                errorMostrarMsjPersona:[],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio:'nombre',
                buscar:'',
                

            }
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
        },
        methods:{
            
            listarPersona(page,buscar,criterio){
                let me=this;
                var url='/user?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta=response.data;
                    me.arrayPersona=respuesta.users.data;
                    me.pagination=respuesta.pagination;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
                
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarPersona(page,buscar,criterio);
            },
            selectRol(){
                let me=this;
                var url='/rol/selectRol';
                axios.get(url).then(function (response) {
                    var respuesta=response.data;
                    me.arrayRol=respuesta.roles;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            selectCargo(){
            let me=this;
                var url='/cargo/selectCargo';
                axios.get(url).then(function (response) {
                    var respuesta=response.data;
                    me.arrayCargo=respuesta.cargos;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            registrarPersona(){
                if(this.validarPersona()){
                    return;
                }
                let me=this;
                axios.post('/user/registrar',{
                    'nombre': this.nombre,
                    'email':this.email,
                    'celular':this.celular,
                    'usuario':this.usuario,
                    'password':this.password,
                    'idrol':this.idrol,
                    'idcargo':this.idcargo
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarPersona(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            actualizarPersona(){
                if(this.validarPersona()){   
                    return;
                }
                let me=this;
                axios.put('/user/actualizar',{
                    'nombre': this.nombre,
                    'email':this.email,
                    'celular':this.celular,
                    'usuario':this.usuario,
                    'password':this.password,
                    'idrol':this.idrol,
                    'idcargo':this.idcargo,
                    'id':this.persona_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarPersona(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            desactivarPersona(id){
                const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                title: '¿Desea desactivar este usuario?',
                text: "El usuario no podra acceder al sistema",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, desactivar usuario!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me=this;
                    axios.put('/user/desactivar',{
                    'id':id
                    }).then(function (response) {
                     me.listarPersona(1,'','nombre');
                    swalWithBootstrapButtons(
                    'Desactivado!',
                    'El usuario fue desactivado.',
                    'success'
                    )
                     })
                    .catch(function (error) {
                    // handle error
                    console.log(error);
                    });
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                    'Cancelado',
                    'El usuario esta a salvo :)',
                    'error'
                    )
                }
                })
            },
            activarPersona(id){
                const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                title: '¿Desea activar este usuario?',
                text: "El usuario podra ingresar al sistema",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, Activar usuario!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me=this;
                    axios.put('/user/activar',{
                    'id':id
                    }).then(function (response) {
                     me.listarPersona(1,'','nombre');
                    swalWithBootstrapButtons(
                    'Activado!',
                    'El usuario fue activado.',
                    'success'
                    )
                     })
                    .catch(function (error) {
                    // handle error
                    console.log(error);
                    });
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                    'Cancelado',
                    'El usuario no se activo :)',
                    'error'
                    )
                }
                })
            },
            validarPersona(){
                this.errorPersona=0;
                this.errorMostrarMsjPersona=[];
                if(!this.nombre) this.errorMostrarMsjPersona.push("El  nombre no puede estar vacio");
                if(!this.usuario) this.errorMostrarMsjPersona.push("El  usuario no puede estar vacio");
                if(!this.password) this.errorMostrarMsjPersona.push("La contraseña no puede estar vacio");
                if(!this.email) this.errorMostrarMsjPersona.push("El email no puede estar vacio");
                if(!this.celular) this.errorMostrarMsjPersona.push("El  celular no puede estar vacio");
                if(this.celular.length>9) this.errorMostrarMsjPersona.push("El  celular no  tener más de 9 dígitos");
                if(this.idrol==0) this.errorMostrarMsjPersona.push("Debes seleccionar un rol para el usuario");
                if(this.idcargo==0) this.errorMostrarMsjPersona.push("Debes seleccionar un cargo para el usuario");
                if(this.errorMostrarMsjPersona.length) this.errorPersona=1;

                return this.errorPersona;
            },
            abrirModal(modelo, accion, data=[]){
                this.selectRol();
                this.selectCargo();
                switch(modelo){
                    case "persona":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.tituloModal="Registrar Usuario";
                                this.modal=1;
                                this.nombre='';
                                this.email='';
                                this.celular='';
                                this.usuario='';
                                this.password='';
                                this.idrol=0;
                                this.idcargo=0;
                                this.tipoAccion=1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.tituloModal="Actualizar Usuario";
                                this.modal=1;
                                this.tipoAccion=2;
                                this.persona_id=data['id'];
                                this.nombre=data['nombre'];
                                this.email=data['email'];
                                this.celular=data['celular'];
                                this.usuario=data['usuario'];
                                this.password=data['password'];
                                this.idrol=data['idrol'];
                                this.idcargo=data['idcargo'];
                                break;
                            }
                        }
                    }
                }
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
                this.email='';
                this.celular='';
                this.usuario='';
                this.password='';
                this.idrol=0;
                this.idcargo=0;
                this.errorMostrarMsjPersona=[];

            }
        },
        mounted() {
            this.listarPersona(1,this.buscar,this.criterio);
        }
    }
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display:list-item !important;
        opacity: 1 !important;
        position:absolute !important;
        background-color: #3c29297a !important;

    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color:red !important;
        font-weight: bold;
    }
</style>
