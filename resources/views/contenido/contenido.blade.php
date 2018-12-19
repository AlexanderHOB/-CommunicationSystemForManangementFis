@extends('principal')
@section('contenido')
@if(Auth::check())
                @if(Auth::user()->idrol ==1)
                    <template v-if="menu==0">
                        <h1>Escritorio</h1>
                    </template>
                
                    <template v-if="menu==1">
                        <cargo></cargo>
                    </template>
                
                    <template v-if="menu==2">
                        <proceso></proceso>
                    </template>
                
                    <template v-if="menu==3">
                        <codigo></codigo>
                    </template>
                
                    <template v-if="menu==4">
                        <procesoCargo></procesoCargo>
                    </template>
                
                    <template v-if="menu==5">
                        <tipo></tipo>
                    </template>
                
                    <template v-if="menu==6">
                        <documento></documento>
                    </template>
                
                    <template v-if="menu==7">
                        <h1>Contenido del menú 7</h1>
                    </template>
                
                    <template v-if="menu==8">
                        <share></share>
                    </template>
                
                    <template v-if="menu==9">
                        <h1>Contenido del menú 9</h1>
                    </template>
                
                    <template v-if="menu==10">
                        <user></user>
                    </template>
                
                    <template v-if="menu==11">
                        <rol> </rol>
                    </template>
                
                    <template v-if="menu==12">
                        <h1>Contenido del menú 12</h1>
                    </template>
                    <template v-if="menu==14">
                        <documentocargo></documentocargo>
                    </template>
                    
                @elseif (Auth::user()->idrol ==2)
                <template v-if="menu==4">
                    <procesoCargo></procesoCargo>
                    </template>
                <template v-if="menu==6">
                    <documentocargo></documentocargo>
                    </template>
                    <template v-if="menu==8">
                        <share></share>
                    </template>
                
                    <template v-if="menu==9">
                        <h1>Contenido del menú 9</h1>
                    </template>

                @else 

                @endif  
            @endif
    
@endsection