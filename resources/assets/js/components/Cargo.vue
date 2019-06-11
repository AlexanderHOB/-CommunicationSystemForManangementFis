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
                        <i class="fa fa-align-justify"></i> Cargo
                        <button type="button" @click="abrirModal('cargo','registrar')" class="btn btn-secondary" >
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
                                    <input type="text" v-model="buscar" @keyup.enter="listarCargo(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary" @click="listarCargo(1,buscar,criterio)"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-lg">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="cargo in arrayCargo" :key="cargo.id">
                                        <td>
                                            <button type="button" @click="abrirModal('cargo','actualizar',cargo)" class="btn btn-warning btn-sm" >
                                            <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            <template v-if="cargo.condicion">
                                                <button type="button" class="btn btn-danger btn-sm" @click="desactivarCargo(cargo.id)">
                                                <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                            <template v-else>
                                                <button type="button" class="btn btn-info btn-sm" @click="activarCargo(cargo.id)">
                                                <i class="icon-check"></i>
                                                </button>
                                            </template>
                                        </td>
                                        <td v-text="cargo.nombre"></td>
                                        <td v-text="cargo.descripcion"></td>
                                        <td>
                                            <div v-if="cargo.condicion">
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
                                        <input type="text" v-model="nombre"  class="form-control" placeholder="Ingrese Cargo">
                                        <span class="help-block">(*) Ingrese el nombre del cargo</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="descripcion" class="form-control" placeholder="Ingrese Descripción">
                                    </div>
                                </div>
                                <div v-show="errorCargo" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjCargo" :key="error" v-text="error">

                                        </div>
                                    </div>  
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarCargo()">Guardar</button>
                            <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarCargo()">Actualizar</button>
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
                cargo_id:0,
                nombre:'',
                descripcion:'',
                arrayCargo:[],
                modal:0,
                tituloModal:'',
                tipoAccion:0,
                errorCargo:0,
                errorMostrarMsjCargo:[],
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
            
            listarCargo(page,buscar,criterio){
                let me=this;
                var url='/cargo?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta=response.data;
                    me.arrayCargo=respuesta.cargos.data;
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
                me.listarCargo(page,me.buscar,me.criterio);
            },
            registrarCargo(){
                if(this.validarCategoria()){
                    return;
                }
                let me=this;
                axios.post('/cargo/registrar',{
                    'nombre': this.nombre,
                    'descripcion':this.descripcion
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarCargo(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            actualizarCargo(){
                if(this.validarCategoria()){
                    return;
                }
                let me=this;
                axios.put('/cargo/actualizar',{
                    'nombre': this.nombre,
                    'descripcion':this.descripcion,
                    'id':this.cargo_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarCargo(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            desactivarCargo(id){
                const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                title: '¿Desea desactivar este registro?',
                text: "El registro no se mostrara al momento de añadir cargo",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, desactivar cargo!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me=this;
                    axios.put('/cargo/desactivar',{
                    'id':id
                    }).then(function (response) {
                     me.listarCargo(1,'','nombre');
                    swalWithBootstrapButtons(
                    'Desactivado!',
                    'Tu registro fue desactivado.',
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
                    'El registro esta a salvo :)',
                    'error'
                    )
                }
                })
            },
            activarCargo(id){
                const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                title: '¿Desea activar este registro?',
                text: "El registro  se mostrara al momento de añadir cargo",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, Activar cargo!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me=this;
                    axios.put('/cargo/activar',{
                    'id':id
                    }).then(function (response) {
                     me.listarCargo(1,'','nombre');
                    swalWithBootstrapButtons(
                    'Activado!',
                    'Tu registro fue activado.',
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
                    'El registro no se activo :)',
                    'error'
                    )
                }
                })
            },
            validarCategoria(){
                this.errorCargo=0;
                this.errorMostrarMsjCargo=[];
                if(!this.nombre) this.errorMostrarMsjCargo.push("El nombre del cargo no puede estar vacio");
                if(this.errorMostrarMsjCargo.length) this.errorCargo=1;

                return this.errorCargo;
            },
            abrirModal(modelo, accion, data=[]){
                switch(modelo){
                    case "cargo":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.tituloModal="Registrar Cargo";
                                this.modal=1;
                                this.nombre='';
                                this.descripcion='';
                                this.tipoAccion=1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.tituloModal="Actualizar Cargo";
                                this.modal=1;
                                this.tipoAccion=2;
                                this.cargo_id=data['id'];
                                this.nombre=data['nombre'];
                                this.descripcion=data['descripcion'];
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
                this.descripcion='';
            }
        },
        mounted() {
            this.listarCargo(1,this.buscar,this.criterio);
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
        position:fixed !important;
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
