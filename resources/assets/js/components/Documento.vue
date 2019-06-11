<style scoped>
    .largo{
        overflow-y:scroll;
    }
    .horizontal{
        overflow-x:scroll;
    }
    .modal-content1{
       width: 100%;
        position: absolute !important;
        margin-bottom: 5px;
    }
    .modal-body1{
        padding: 0px;
    }
    .pdf{
        width: 100%;
        height: 80vh;
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
                        <i class="fa fa-align-justify"></i> Documento
                        <button type="button" @click="abrirModal('documento','registrar')" class="btn btn-secondary" >
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
                                    <input type="text" v-model="buscar" @keyup.enter="listarDocumento(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary" @click="listarDocumento(1,buscar,criterio)"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-lg horizontal">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Proceso</th>
                                        <th>Tipo de Documento</th>
                                        <!-- <th>Ubicacion</th> -->
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="documento in arrayDocumento" :key="documento.id">
                                        <td style="text-align:center;">
                                            <button  type="button" @click="abrirModal('documento','actualizar',documento)" class="btn btn-warning btn-sm" >
                                            <i class="icon-pencil"></i>
                                            </button> 
                                            <template v-if="documento.condicion">
                                                <button  type="button" class="btn btn-danger btn-sm" @click="desactivarDocumento(documento.id)">
                                                <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                            <template v-else>
                                                <button   type="button" class="btn btn-info btn-sm" @click="activarDocumento(documento.id)">
                                                <i class="icon-check"></i>
                                                </button>
                                            </template>                                           
                                            <button   type="button" class="btn btn-info btn-sm" @click="abrirModal('documento','observar',documento)">
                                            <i class="far fa-eye"></i>                                       
                                            </button> 
                                        </td>
                                        <td v-text="documento.nombre"></td>
                                        <td v-text="documento.descripcion"></td>
                                        <td v-text="documento.nombre_proceso"></td>
                                        <td v-text="documento.nombre_tipo"></td>
                                        <!-- <td v-text="documento.ubicacion"></td> -->
                                        <td>
                                            <div v-if="documento.condicion">
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
            <div class="modal fade largo    "  tabindex="-1" :class="{'mostrar':modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                                        <input type="text" v-model="nombre"  class="form-control" placeholder="Ingrese Documento">
                                        <span class="help-block">(*) Ingrese el nombre del Documento</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Tipo De Documento</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="idtipo">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="tipo in arrayTipo" :key="tipo.id" :value="tipo.id" v-text="tipo.nombre"></option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Proceso</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="idproceso">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="proceso in arrayProceso" :key="proceso.id" :value="proceso.id" v-text="proceso.nombre"></option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="descripcion" class="form-control" placeholder="Ingrese Descripción">
                                    </div>
                                </div>
                                <!-- <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" ></vue-dropzone> -->
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Pdf</label>
                                    <div class="col-md-9">
                                        <input type="file"  class="form-control" @change="fieldChange" >
                                    </div>
                                </div>
                                <div v-show="errorDocumento" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjDocumento" :key="error" v-text="error">

                                        </div>
                                    </div>  
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarDocumento()">Guardar</button>
                            <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarDocumento()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
            <!-- Modal Documento-->
            <div class="modal fade"  tabindex="-1" :class="{'mostrar':modal1}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <embed v-bind:src="'images/'+pdfruta + '#toolbar=0'" type="application/pdf" class="pdf"></embed>
                        </div>
                       
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin de Modal-->
        </main>
</template>

<script>

    export default {
    // components: {
    //     vueDropzone: vue2Dropzone
    //   },
        data(){
            return{
                documento_id:0,
                idtipo:0,
                idproceso:0,
                nombre_tipo:'',
                nombre:'',
                descripcion:'',
                ubicacion:'',
                pdfruta:'',
                arrayDocumento:[],
                modal:0,
                modal1:0,
                tituloModal:'',
                tipoAccion:0,
                errorDocumento:0,
                errorMostrarMsjDocumento:[],
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
                arrayTipo:[],
                arrayProceso:[],
                file:0,
                dropzoneOptions: {
                    url: '/documento/registrar',
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                    },
               addRemoveLinks:true,
                },
               attachment:null,
               form:new FormData
          
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
            fieldChange(e){
                console.log(e);
                let selectedFile=e.target.files[0];
                this.attachment=selectedFile;
            },
            listarDocumento(page,buscar,criterio){
                let me=this;
                var url='/documento?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta=response.data;
                    me.arrayDocumento=respuesta.documentos.data;
                    me.pagination=respuesta.pagination;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
                
            },
            selectTipo(){
                let me=this;
                var url='/tipo/selectTipo';
                axios.get(url).then(function (response) {
                    //console.log(response);
                     var respuesta=response.data;
                    me.arrayTipo=respuesta.tipos;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            selectProceso(){
                let me=this;
                var url='/proceso/selectProceso';
                axios.get(url).then(function (response) {
                    //console.log(response);
                     var respuesta=response.data;
                    me.arrayProceso=respuesta.procesos;
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
                me.listarDocumento(page,me.buscar,me.criterio);
            },
            registrarDocumento(){
                if(this.validarDocumento()){
                    return;
                }
                let me=this;
                this.form.append('pic',this.attachment);
                this.form.set('nombre', this.nombre);
                this.form.set('idtipodocumento',this.idtipo);
                this.form.set('descripcion',this.descripcion);
                this.form.set('idproceso',this.idproceso,);
                const config={header:{'Content-Type':'multipart/form-data'}};

                axios.post('/documento/registrar',this.form,config).then(function (response) {
                    me.cerrarModal();
                    me.listarDocumento(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            actualizarDocumento(){
                if(this.validarDocumento()){
                    return;
                }
                let me=this;
                axios.put('/documento/actualizar',{
                    'nombre': this.nombre,
                    'idtipodocumento':this.idtipo,
                    'descripcion':this.descripcion,
                    'ubicacion':this.ubicacion,
                    'idproceso':this.idproceso,
                    'id':this.documento_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarDocumento(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            desactivarDocumento(id){
                const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                title: '¿Desea desactivar este registro?',
                text: "El registro no se mostrara al momento de añadir documento",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, desactivar Documento!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me=this;
                    axios.put('/documento/desactivar',{
                    'id':id
                    }).then(function (response) {
                     me.listarDocumento(1,'','nombre');
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
            activarDocumento(id){
                const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                title: '¿Desea activar este registro?',
                text: "El registro  se mostrara al momento de añadir documento",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, Activar documento!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me=this;
                    axios.put('/documento/activar',{
                    'id':id
                    }).then(function (response) {
                     me.listarDocumento(1,'','nombre');
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
            validarDocumento(){
                this.errorDocumento=0;
                this.errorMostrarMsjDocumento=[];
                if(!this.nombre) this.errorMostrarMsjDocumento.push("El nombre del Documento no puede estar vacio");
                if(this.idtipo==0) this.errorMostrarMsjDocumento.push("El tipo del Documento no puede estar vacio");
                if(this.idproceso==0) this.errorMostrarMsjDocumento.push("El proceso del Documento no puede estar vacio");
                
                if(this.errorMostrarMsjDocumento.length) this.errorDocumento=1;

                return this.errorDocumento;
            },
            abrirModal(modelo, accion, data=[]){
                switch(modelo){
                    case "documento":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.tituloModal="Registrar Documento";
                                this.modal=1;
                                this.nombre='';
                                this.tipo=''
                                this.descripcion='';
                                this.ubicacion='';
                                this.tipoAccion=1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.tituloModal="Actualizar Documento";
                                this.modal=1;
                                this.tipoAccion=2;
                                this.documento_id=data['id'];
                                this.nombre=data['nombre'];
                                this.idtipo=data['idtipodocumento'];
                                this.idproceso=data['idproceso'];
                                this.descripcion=data['descripcion'];
                                this.ubicacion=data['ubicacion'];
                                break;
                            }
                            case 'observar':
                            {
                                this.tituloModal=" Documento PDF";
                                this.modal1=1;
                                this.pdfruta=data['ubicacion'];
                                break;
                            }
                        }
                    }
                    this.selectTipo();
                    this.selectProceso();
                }
            },
            cerrarModal(){
                this.modal=0;
                this.modal1=0;
                this.tituloModal='';
                this.nombre='';
                this.idproceso=0,
                this.idtipo=0,
                this.descripcion='';
                this.ubicacion='';
            }
        },
        mounted() {
            this.listarDocumento(1,this.buscar,this.criterio);
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
