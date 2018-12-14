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
                        <i class="fa fa-align-justify"></i> Procesos
                        <button type="button" @click="abrirModal('proceso','registrar')" class="btn btn-secondary" >
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
                                    <input type="text" v-model="buscar" @keyup.enter="listarProceso(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary" @click="listarProceso(1,buscar,criterio)"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-lg">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Periodo</th>
                                        <th>Usuario</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="proceso in arrayProceso" :key="proceso.id">
                                        <td>
                                            <button type="button" @click="abrirModal('proceso','actualizar',proceso)" class="btn btn-warning btn-sm" >
                                            <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            <template v-if="proceso.condicion">
                                                <button type="button" class="btn btn-danger btn-sm" @click="desactivarProceso(proceso.id)">
                                                <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                            <template v-else>
                                                <button type="button" class="btn btn-info btn-sm" @click="activarProceso(proceso.id)">
                                                <i class="icon-check"></i>
                                                </button>
                                            </template>
                                        </td>
                                        <td v-text="proceso.nombre"></td>
                                        <td v-text="proceso.periodo"></td>
                                        <td v-text="proceso.usuario"></td>
                                        <td>
                                            <div v-if="proceso.condicion">
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
            <div class="modal fade"  tabindex="-1" :class="{'mostrar':modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                                        <input type="text" v-model="nombre"  class="form-control" placeholder="Ingrese Proceso">
                                        <span class="help-block">(*) Ingrese el nombre del proceso</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Periodo</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="periodo"  class="form-control" placeholder="Ingrese periodo">
                                        <span class="help-block">(*) Ingrese  periodo</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Usuario a Cargo</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="iduser">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="user in arrayUser" :key="user.id" :value="user.id" v-text="user.usuario"></option>

                                        </select>
                                    </div>
                                </div>
                                <div v-show="errorProceso" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjProceso" :key="error" v-text="error">

                                        </div>
                                    </div>  
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarProceso()">Guardar</button>
                            <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarProceso()">Actualizar</button>
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
                proceso_id:0,
                iduser:0,
                usuario:'',
                nombre:'',
                periodo:'',
                arrayProceso:[],
                modal:0,
                tituloModal:'',
                tipoAccion:0,
                errorProceso:0,
                errorMostrarMsjProceso:[],
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
                arrayUser:[]
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
            
            listarProceso(page,buscar,criterio){
                let me=this;
                var url='/proceso?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta=response.data;
                    me.arrayProceso=respuesta.procesos.data;
                    me.pagination=respuesta.pagination;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
                
            },
            selectUser(){
                let me=this;
                var url='/user/selectUser';
                axios.get(url).then(function (response) {
                    //console.log(response);
                     var respuesta=response.data;
                    me.arrayUser=respuesta.users;
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
                me.listarProceso(page,buscar,criterio);
            },
            registrarProceso(){
                if(this.validarProceso()){
                    return;
                }
                let me=this;
                axios.post('/proceso/registrar',{
                    'nombre': this.nombre,
                    'iduser':this.iduser,
                    'periodo':this.periodo,
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarProceso(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            actualizarProceso(){
                if(this.validarProceso()){
                    return;
                }
                let me=this;
                axios.put('/proceso/actualizar',{
                    'nombre': this.nombre,
                    'iduser':this.iduser,
                    'periodo':this.periodo,
                    'id':this.proceso_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarProceso(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            desactivarProceso(id){
                const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                title: '¿Desea desactivar este registro?',
                text: "El proceso no se mostrara al momento de añadir documento",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, desactivar proceso!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me=this;
                    axios.put('/proceso/desactivar',{
                    'id':id
                    }).then(function (response) {
                     me.listarProceso(1,'','nombre');
                    swalWithBootstrapButtons(
                    'Desactivado!',
                    'Tu proceso fue desactivado.',
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
                    'El proceso esta a salvo :)',
                    'error'
                    )
                }
                })
            },
            activarProceso(id){
                const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                title: '¿Desea activar este registro?',
                text: "El proceso  se mostrara al momento de añadir documento",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, Activar proceso!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me=this;
                    axios.put('/proceso/activar',{
                    'id':id
                    }).then(function (response) {
                     me.listarProceso(1,'','nombre');
                    swalWithBootstrapButtons(
                    'Activado!',
                    'Tu proceso fue activado.',
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
                    'El proceso no se activo :)',
                    'error'
                    )
                }
                })
            },
            validarProceso(){
                this.errorProceso=0;
                this.errorMostrarMsjProceso=[];
                if(!this.nombre) this.errorMostrarMsjProceso.push("El nombre del Proceso no puede estar vacio");
                if(!this.periodo) this.errorMostrarMsjProceso.push("El periodo no puede estar vacio");
                if(this.iduser==0) this.errorMostrarMsjProceso.push("Necesita añadir un usuario");
                if(this.errorMostrarMsjProceso.length) this.errorProceso=1;

                return this.errorProceso;
            },
            abrirModal(modelo, accion, data=[]){
                switch(modelo){
                    case "proceso":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.tituloModal="Registrar Proceso";
                                this.modal=1;
                                this.nombre='';
                                this.periodo='';
                                this.iduser='';
                                this.tipoAccion=1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.tituloModal="Actualizar Proceso";
                                this.modal=1;
                                this.tipoAccion=2;
                                this.proceso_id=data['id'];
                                this.iduser=0;
                                this.nombre=data['nombre'];
                                this.periodo=data['periodo'];
                                break;
                            }
                        }
                    }
                    this.selectUser();
                }
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.proceso_id=0;
                this.nombre='';
                this.iduser=0;
                this.periodo='';
                this.errorMostrarMsjProceso=[];
            }
        },
        mounted() {
            this.listarProceso(1,this.buscar,this.criterio);
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
