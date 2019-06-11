<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- <div class="container-fluid">
                
                <h2 class="text-center">Comunicados</h2>
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                        <div class="card-header">
                            Comunicado 1
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Reunion</h5>
                            <p class="card-text">Se realizara una reunion el dia sabado 21 de Diciembre .</p>
                            <a href="#" class="btn btn-primary">Más</a>
                        </div>
                        <div class="card-footer text-muted">
                            2 dia atras
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                        <div class="card-header">
                            Comunicado 2
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Proceso de Gestión</h5>
                            <p class="card-text">Se presentaron algunos problemas en el proceso de gestion.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                            4 dias atras
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                        <div class="card-header">
                            Comunicado 3
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Auditoria</h5>
                            <p class="card-text">Se realizara una auditoria el dia 19 de diciembre.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                           1 dia atras
                        </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--Fin del modal-->
            <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="car-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4>Documentos Actualizados </h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="ingresos">                                                
                                    </canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Documentos Actualizados por meses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4>Ingresos por mes</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="Logeos">                                                
                                    </canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Ingreso a la plataforma.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </main>
</template>
<script>
    export default {
        
        data (){
            return {
                varIngreso:null,
                charIngreso:null,
                ingresos:[],
                varTotalIngreso:[],
                varMesIngreso:[], 
                
                varLogeo:null,
                varUser:[],
                charLogeo:null,
                logeos:[],
                varTotalLogeo:[],
                varMesLogeo:[],
            }
        },
        methods : {
            getIngresos(){
                let me=this;
                var url='/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.ingresos = respuesta.ingresos;
                    //cargamos los datos del chart
                    me.loadIngresos();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getLogeo(){
                let me=this;
                var url='/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.logeos = respuesta.logeo;
                    //cargamos los datos del chart
                    me.loadLogeo();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadIngresos(){
                let me=this;
                let meses = ["Lunes", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]; 
                me.ingresos.map(function(x){
                    me.varMesIngreso.push(x.dia+' '+meses[x.mes-1]);
                    me.varTotalIngreso.push(x.cantidad);
                });
                me.varIngreso=document.getElementById('ingresos').getContext('2d');

                me.charIngreso = new Chart(me.varIngreso, {
                    type: 'bar',
                    data: {
                        labels: me.varMesIngreso,
                        datasets: [{
                            label: 'Actualizaciones',
                            data: me.varTotalIngreso,
                            backgroundColor: 'rgba(54,162,245,0.9)',
                            borderColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            },
            loadLogeo(){
                let me=this;
                let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]; 
                me.logeos.map(function(x){
                    me.varMesLogeo.push(meses[x.mes-1]);
                    me.varTotalLogeo.push(x.logeos);
                    me.varUser.push(x.usuario);
                });
                me.varLogeo=document.getElementById('Logeos').getContext('2d');

                me.charLogeo = new Chart(me.varLogeo, {
                    type: 'polarArea',
                    data: {
                        labels: me.varUser,
                        datasets: [{

                            data: me.varTotalLogeo,
                            backgroundColor: ['#36A2EB','#FF6384','#4BC0C0','#FFCD56','#5e35b1','#76ff03','#ff3d00','#c6ff00'],
                            borderColor: 'rgba(255,255,255,0.8)',
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            }
        },
        mounted() {
            this.getIngresos();
            this.getLogeo();
        }
    }
</script>

