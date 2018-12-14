@extends('principal')
@section('contenido')
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
        <h1>Contenido del menú 4</h1>
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
        <documento></documento>
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
    
@endsection