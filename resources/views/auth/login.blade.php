@extends('auth.contenido')

@section('login')
<div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-group mb-0">
        <div class="logeo card p-4" >
        <form class="form-horizontal was-validated" method="post" action="{{route('login')}}">
            {{csrf_field()}}
          <div class="card-body">
            <h1>Acceder</h1>
            <p class="text-muted">Control de acceso al sistema</p>
          <div class="form-group mb-3{{$errors->has('usuario'? 'is-invalid':'')}}">
              <span class="input-group-addon"><i class="icon-user"></i></span>
              <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
              {!! $errors->first('usuario','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group mb-4 {{$errors->has('password'? 'is-invalid':'')}}">
              <span class="input-group-addon"><i class="icon-lock"></i></span>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              {!! $errors->first('password','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="row">
              <div class="col-6">
                <button type="submit" class="btn btn-primary px-4">Acceder</button>
              </div>
            </div>
          </div>
        </form>
        </div>
        <div class="card text-white bg-primary py-1 d-md-down-none row log2" style="width:44%">
            <div class="card-body text-center log2">
                <h4>Facultad de Ingeniería de Sistemas</h4>             
            </div>
              <div class="">
                  <!--primer vector-->
                        <svg id=first version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="800px"
                             height="800px" viewBox="0 0 600 604" style="enable-background:new 0 0 600 604;" xml:space="preserve">
                        <style type="text/css">
                            .st10{fill:none;stroke:#FFFFFF;stroke-miterlimit:10;}
                            .st11{fill:none;stroke:#0083D3;stroke-width:3;stroke-miterlimit:10;}
                            .st12{fill:none;stroke:#0083D3;stroke-miterlimit:10;}
                            .st13{fill:none;stroke:#FFCD00;stroke-width:3;stroke-miterlimit:10;}
                        </style>
                        <defs>
                        </defs>
                        <path class="st10" d="M3.5,1.5l-2,599l597,2 M126.5,579.5h-99v-102h99V579.5z M126.5,466.5h-99v-102h99V466.5z M126.5,353.5h-99v-102
                            h99V353.5z M126.5,240.5h-99v-102h99V240.5z M126.5,127.5h-99v-102h99V127.5z M238.5,579.5h-99v-102h99V579.5z M238.5,466.5h-99
                            v-102h99V466.5z M238.5,353.5h-99v-102h99V353.5z M238.5,240.5h-99v-102h99V240.5z M238.5,127.5h-99v-102h99V127.5z M350.5,579.5
                            h-99v-102h99V579.5z M350.5,466.5h-99v-102h99V466.5z M350.5,353.5h-99v-102h99V353.5z M350.5,240.5h-99v-102h99V240.5z
                             M350.5,127.5h-99v-102h99V127.5z M462.5,579.5h-99v-102h99V579.5z M462.5,466.5h-99v-102h99V466.5z M462.5,353.5h-99v-102h99V353.5
                            z M462.5,240.5h-99v-102h99V240.5z M462.5,127.5h-99v-102h99V127.5z M574.5,579.5h-99v-102h99V579.5z M574.5,466.5h-99v-102h99
                            V466.5z M574.5,353.5h-99v-102h99V353.5z M574.5,240.5h-99v-102h99V240.5z M574.5,127.5h-99v-102h99V127.5z"/>
                        <path class="st11" d="M598.5,602.5 1.5,600.5 3.5,1.5 598.5,1.5z "/>
                        <g>
                            <path  class="st12" d="M570.5,32.1 571.3,29.3 42.3,171.3 429.3,558.3 570.4,32.6z 	"/>
                            <g>
                                <path class="st13" d="M444.5,254.6 160,539.1 276.5,542.6 449.5,369.6z 		"/>
                                <path class="st13" d="M518.8,136.8 234.3,421.3 230.8,304.8 403.8,131.8z 		"/>
                                <path class="st13" d="M354.8,142.8 70.3,427.3 66.8,310.8 239.8,137.8z 		"/>
                            </g>
                        </g>
                        </svg>
                       </div>
                  <!-- Segundo vector-->
                  
                      <svg id=second version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="599px"
                           height="601px" viewBox="0 0 599 601" style="enable-background:new 0 0 599 601;" xml:space="preserve">
                      <style type="text/css">
                          .st0{fill:#4297D5;}
                          .st1{fill:#0F0B0B;}
                          .st2{fill:#FFFFFF;}
                          .st3{fill:#4297D5;stroke:#050202;stroke-width:3;stroke-miterlimit:10;}
                          .st4{fill:#FFCD00;stroke:#070303;stroke-width:3;stroke-miterlimit:10;}
                      </style>
                      <defs>
                      </defs>
                      <g>
                          <g>
                              <path class="st0" d="M0.5,598.5l2-598l596,2l-2,598L0.5,598.5z M473.5,578.5h100v-103h-100V578.5z M361.5,578.5h100v-103h-13.2
                                  l2.7-10h10.5v-39.2l12-44.7v83.9h100v-103h-94.9l2.7-10h92.2v-103H509l2.7-10h61.9v-103h-34.2l2.7-10h31.5v-103h-100v30.7l-12,3.2
                                  V23.5h-100v60.8l-12,3.2v-64h-100v90.8l-12,3.2V23.5h-100v103h66.7l-37.3,10h-29.5v7.9l-12,3.2v-11.1h-100v103h80.3l10,10H25.5
                                  v103h38.2l0.3,10H25.5v103h100v-96.3l16.7-16.7h76.6l9.4,9.4l0,0.6h-90.7v103h91.8l-10,10h-81.8v103h100v-36.3l12,0.4v35.9h100
                                  v-95.3l12,12V578.5z M25.5,578.5h100v-103h-100V578.5z M25.5,126.5h100v-103h-100V126.5z"/>
                              <path class="st1" d="M3,1l595,2l-2,597L1,598L3,1 M473,53.8l-11,3V24v-1h-1h-99h-1v1v59.9l-11,3V24v-1h-1h-99h-1v1v90l-11,3V24v-1
                                  h-1h-99h-1v1v102v1h1h62.4l-33.5,9H138h-1v1v7l-11,3v-10v-1h-1H26h-1v1v102v1h1h79.6l9,9H26h-1v1v102v1h1h37.3l0.3,9H26h-1v1v102
                                  v1h1h99h1v-1v-95.6l16.4-16.4h76.2l9,9H138h-1v1v102v1h1h90.1l-9,9H138h-1v1v102v1h1h99h1v-1v-35.3l11,0.3v35v1h1h99h1v-1v-93.6
                                  l11,11V578v1h1h99h1v-1V476v-1h-1h-12.1l2.4-9h9.6h1v-1v-38.6l11-41V465v1h1h99h1v-1V363v-1h-1h-93.7l2.4-9H573h1v-1V250v-1h-1
                                  h-63.4l2.4-9h61h1v-1V137v-1h-1h-33.1l2.4-9H573h1v-1V24v-1h-1h-99h-1v1V53.8 M25,127h1h99h1v-1V24v-1h-1H26h-1v1v102V127
                                   M473,579h1h99h1v-1V476v-1h-1h-99h-1v1v102V579 M25,579h1h99h1v-1V476v-1h-1H26h-1v1v102V579 M2,0L0,599l597,2l2-599L2,0L2,0z
                                   M461,58.1l13-3.5V24h99v102h-31.4l-3,11H573v102h-61.7l-3,11H573v102h-92.1l-3,11h95v102h-99v-87.2l-13,48.4V465h-10.4l-3,11H461
                                  v102h-99v-83l-13-13v96h-99v-35.9l-13-0.4V578h-99V476h81.5l11-11H138V363h90.7l0-1.3L219,352h-77l-17,17v96H26V363h38.6l-0.3-11
                                  H26V250h91l-11-11H26V137h99v11.3l13-3.5V137h29l41-11h-70V24h99v94.2l13-3.5V24h99v64.2l13-3.5V24h99V58.1L461,58.1z M26,126V24
                                  h99v102H26L26,126z M474,578V476h99v102H474L474,578z M26,578V476h99v102H26L26,578z"/>
                          </g>
                          <g>
                              <polygon class="st0" points="340.7,475.5 341.2,474.9 341.8,475.5 		"/>
                              <polygon class="st1" points="341.2,474.2 339.5,476 343,476 341.2,474.2 		"/>
                          </g>
                          <g>
                              <polygon class="st0" points="237.5,415.2 249.5,403.2 249.5,445.3 237.5,457.3 		"/>
                              <path class="st1" d="M249,404.4v40.7l-11,11v-40.7L249,404.4 M250,402l-13,13v43.5l13-13V402L250,402z"/>
                          </g>
                          <g>
                              <rect x="26.5" y="24.5" class="st2" width="98" height="101"/>
                              <path d="M124,25v100H27V25H124 M125,24H26v102h99V24L125,24z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="138.5,125.5 138.5,24.5 236.5,24.5 236.5,117.8 207.9,125.5 		"/>
                              <path d="M236,25v92.4l-28.1,7.6H139V25H236 M237,24h-99v102h70l29-7.8V24L237,24z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="250.5,24.5 348.5,24.5 348.5,87.8 250.5,114.1 		"/>
                              <path d="M348,25v62.4l-97,26V25H348 M349,24h-99v90.7l99-26.6V24L349,24z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="362.5,24.5 460.5,24.5 460.5,57.7 362.5,84 		"/>
                              <path d="M460,25v32.3l-97,26V25H460 M461,24h-99v60.7l99-26.6V24L461,24z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="542.2,125.5 568.2,28.8 474.5,53.9 474.5,24.5 572.5,24.5 572.5,125.5 		"/>
                              <path d="M572,25v100h-29.1l25.6-95.2l0.4-1.7l-1.7,0.4L475,53.3V25H572 M573,24h-99v30.6l93.5-25.1L541.6,126H573V24L573,24z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="26.5,238.5 26.5,137.5 124.5,137.5 124.5,147.9 37.5,171.2 104.8,238.5 		"/>
                              <path d="M124,138v9.5l-85.8,23l-1.7,0.4l1.2,1.2l65.8,65.8H27V138H124 M125,137H26v102h80l-67.5-67.5l86.5-23.2V137L125,137z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="138.5,137.5 163.2,137.5 138.5,144.1 		"/>
                              <path d="M159.4,138l-20.4,5.5V138H159.4 M167,137h-29v7.8L167,137L167,137z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="511.9,238.5 539,137.5 572.5,137.5 572.5,238.5 		"/>
                              <path d="M572,138v100h-59.4l26.8-100H572 M573,137h-34.4l-27.4,102H573V137L573,137z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="26.5,351.5 26.5,250.5 116.8,250.5 119.8,253.5 62.5,310.8 63.7,351.5 		"/>
                              <path d="M116.6,251l2.5,2.5l-56.8,56.8l-0.3,0.3l0,0.4l1.2,40H27V251H116.6 M117,250H26v102h38.2L63,311l57.5-57.5L117,250
                                  L117,250z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="143.2,351.5 180.5,314.2 217.8,351.5 		"/>
                              <path d="M180.5,314.9l36.1,36.1h-72.2L180.5,314.9 M180.5,313.5L142,352h77L180.5,313.5L180.5,313.5z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="481.6,351.5 508.7,250.5 572.5,250.5 572.5,351.5 		"/>
                              <path d="M572,251v100h-89.8l26.8-100H572 M573,250h-64.7l-27.4,102H573V250L573,250z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="26.5,464.5 26.5,363.5 64.1,363.5 66,428.7 124.5,370.2 124.5,464.5 		"/>
                              <path d="M63.6,364l1.9,63.5l0.1,2.3l1.6-1.6l56.8-56.8V464H27V364H63.6 M64.6,363H26v102h99v-96l-58.5,58.5L64.6,363L64.6,363z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="138.5,464.5 138.5,363.5 228.3,363.5 230,422.7 236.5,416.2 236.5,458.3 230.3,464.5 		"/>
                              <path d="M227.8,364l1.7,57.5l0.1,2.3l1.6-1.6l4.8-4.8v40.7l-5.9,5.9H139V364H227.8 M228.7,363H138v102h92.5l6.5-6.5V415l-6.5,6.5
                                  L228.7,363L228.7,363z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="250.5,402.2 259.5,393.2 280.5,414.2 250.5,444.3 		"/>
                              <path d="M259.5,393.9l20.3,20.3L251,443.1v-40.7L259.5,393.9 M259.5,392.5L250,402v43.5l31.3-31.3L259.5,392.5L259.5,392.5z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="451.2,464.5 460.5,430 460.5,464.5 		"/>
                              <path d="M460,433.8V464h-8.1L460,433.8 M461,426.2L450.6,465H461V426.2L461,426.2z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="474.5,464.5 474.5,377.9 478.4,363.5 572.5,363.5 572.5,464.5 		"/>
                              <path d="M572,364v100h-97v-86l3.7-14H572 M573,363h-95l-4,14.8V465h99V363L573,363z"/>
                          </g>
                          <g>
                              <rect x="26.5" y="476.5" class="st2" width="98" height="101"/>
                              <path d="M124,477v100H27V477H124 M125,476H26v102h99V476L125,476z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="138.5,577.5 138.5,476.5 218.3,476.5 155.1,539.7 236.5,542.2 236.5,577.5 		"/>
                              <path d="M217.1,477l-61.5,61.5l-1.6,1.6l2.3,0.1l79.8,2.4V577h-97V477H217.1 M219.5,476H138v102h99v-36.3l-80.8-2.4L219.5,476
                                  L219.5,476z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="250.5,577.5 250.5,542.6 272.9,543.2 339.7,476.5 342.8,476.5 348.5,482.2 348.5,577.5 		"/>
                              <path d="M342.6,477l5.4,5.4V577h-97v-33.9l21.7,0.7l0.4,0l0.3-0.3l66.5-66.5H342.6 M343,476h-3.5l-66.8,66.7l-22.8-0.7V578h99v-96
                                  L343,476L343,476z"/>
                          </g>
                          <g>
                              <polygon class="st2" points="362.5,577.5 362.5,496.2 425.8,559.5 448,476.5 460.5,476.5 460.5,577.5 		"/>
                              <path d="M460,477v100h-97v-79.6l61.8,61.8l1.2,1.2l0.4-1.7l21.9-81.8H460 M461,476h-13.4l-22.1,82.5L362,495v83h99V476L461,476z"
                                  />
                          </g>
                          <g>
                              <rect x="474.5" y="476.5" class="st2" width="98" height="101"/>
                              <path d="M572,477v100h-97V477H572 M573,476h-99v102h99V476L573,476z"/>
                          </g>
                          <polygon class="st3" points="474,54.6 461,58.1 362,84.7 349,88.1 250,114.7 237,118.2 208,126 167,137 138,144.8 125,148.3
                              38.5,171.5 106,239 117,250 120.5,253.5 236,138 351,143 180.5,313.5 219,352 228.7,361.7 227,305 400,132 515,137 259.5,392.5
                              281.2,414.2 440.7,254.7 445.7,369.7 341.2,474.2 343,476 349,482 362,495 425.5,558.5 447.6,476 450.6,465 461,426.2 474,377.8
                              478,363 480.9,352 508.3,250 511.3,239 538.6,137 541.6,126 567.5,29.5 	"/>
                          <polygon class="st4" points="339.5,476 341.2,474.2 445.7,369.7 440.7,254.7 281.2,414.2 250,445.5 237,458.5 230.5,465 219.5,476
                              156.2,539.2 237,541.7 250,542.1 272.7,542.7 	"/>
                          <polygon class="st4" points="237,415 250,402 259.5,392.5 515,137 400,132 227,305 228.7,361.7 228.7,363 230.5,421.5 	"/>
                          <polygon class="st4" points="351,143 236,138 120.5,253.5 63,311 64.2,352 64.6,363 66.5,427.5 125,369 142,352 180.5,313.5 	"/>
                      </g>
                      </svg>     

                    </div>     
        </div>
      </div>
    </div>
  </div>
@endsection
