
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">School Results</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>shop </title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(0.000000, 148.000000)">
                      <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                      <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Profile Navigation</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('user-profile') ? 'active' : '') }} " href="{{ url('user-profile') }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
    <svg width="12px" height="12px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>user-profile</title>
        <g id="user-profile-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <!-- Capul utilizatorului -->
            <circle class="color-foreground" cx="24" cy="16" r="8" fill="#6C63FF"></circle>
            <!-- Corpul utilizatorului -->
            <path class="color-foreground" d="M12,36 C12,30 17.925,26 24,26 C30.075,26 36,30 36,36 L36,38 C36,38.553 35.553,39 35,39 L13,39 C12.447,39 12,38.553 12,38 L12,36 Z" fill="#6C63FF"></path>
        </g>
    </svg>
</div>


            <span class="nav-link-text ms-1">User Profile</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Main Navigation</h6>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('school_subjects') ? 'active' : '') }}" href="{{ url('school_subjects') }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>box-3d-50</title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(603.000000, 0.000000)">
                      <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                      <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                      <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
            <span class="nav-link-text ms-1">School Subjects</span>
        </a>
      </li> 
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('grades') ? 'active' : '') }}" href="{{ url('grades') }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>box-3d-50</title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(603.000000, 0.000000)">
                      <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                      <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                      <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
            <span class="nav-link-text ms-1">Grades</span>
        </a>
      </li>
      
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Navigation</h6>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('students') ? 'active' : '') }}" href="{{ url('students') }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
    <svg width="12px" height="12px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>students-icon</title>
        <g id="students-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <!-- Pălăria de absolvire -->
            <path class="color-foreground" d="M24,10 L40,16 L24,22 L8,16 L24,10 Z" fill="#6C63FF"></path>
            <path class="color-foreground" d="M24,22 L24,26 C24,26.553 23.553,27 23,27 L9,21 C8.447,21 8,20.553 8,20 L8,18 L24,22 Z" fill="#6C63FF" opacity="0.7"></path>
            <!-- Capul studentului -->
            <circle class="color-foreground" cx="24" cy="28" r="6" fill="#6C63FF"></circle>
            <!-- Corpul studentului -->
            <path class="color-foreground" d="M16,36 C16,31.582 20.029,28 24,28 C27.971,28 32,31.582 32,36 L32,38 C32,38.553 31.553,39 31,39 L17,39 C16.447,39 16,38.553 16,38 L16,36 Z" fill="#6C63FF"></path>
        </g>
    </svg>
</div>

            <span class="nav-link-text ms-1">Students</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('parents') ? 'active' : '') }}" href="{{ url('parents') }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
    <svg width="12px" height="12px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>students-icon</title>
        <g id="students-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <!-- Pălăria de absolvire -->
            <path class="color-foreground" d="M24,10 L40,16 L24,22 L8,16 L24,10 Z" fill="#6C63FF"></path>
            <path class="color-foreground" d="M24,22 L24,26 C24,26.553 23.553,27 23,27 L9,21 C8.447,21 8,20.553 8,20 L8,18 L24,22 Z" fill="#6C63FF" opacity="0.7"></path>
            <!-- Capul studentului -->
            <circle class="color-foreground" cx="24" cy="28" r="6" fill="#6C63FF"></circle>
            <!-- Corpul studentului -->
            <path class="color-foreground" d="M16,36 C16,31.582 20.029,28 24,28 C27.971,28 32,31.582 32,36 L32,38 C32,38.553 31.553,39 31,39 L17,39 C16.447,39 16,38.553 16,38 L16,36 Z" fill="#6C63FF"></path>
        </g>
    </svg>
</div>

            <span class="nav-link-text ms-1">Parents</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('teachers') ? 'active' : '') }}" href="{{ url('teachers') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
    <svg width="12px" height="12px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>teachers-icon</title>
        <g id="teachers-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <!-- Silueta profesorului principal -->
            <circle class="color-foreground" cx="24" cy="14" r="6" fill="#6C63FF"></circle>
            <path class="color-foreground" d="M18,24 C18,20.686 20.686,18 24,18 C27.314,18 30,20.686 30,24 L30,26 C30,26.553 29.553,27 29,27 L19,27 C18.447,27 18,26.553 18,26 L18,24 Z" fill="#6C63FF"></path>
            <!-- Silueta secundară (profesor 1) -->
            <circle class="color-foreground" cx="14" cy="16" r="4" fill="#B8B8FF"></circle>
            <path class="color-foreground" d="M10,22 C10,19.791 11.791,18 14,18 C16.209,18 18,19.791 18,22 L18,23 C18,23.553 17.553,24 17,24 L11,24 C10.447,24 10,23.553 10,23 L10,22 Z" fill="#B8B8FF"></path>
            <!-- Silueta secundară (profesor 2) -->
            <circle class="color-foreground" cx="34" cy="16" r="4" fill="#B8B8FF"></circle>
            <path class="color-foreground" d="M30,22 C30,19.791 31.791,18 34,18 C36.209,18 38,19.791 38,22 L38,23 C38,23.553 37.553,24 37,24 L31,24 C30.447,24 30,23.553 30,23 L30,22 Z" fill="#B8B8FF"></path>
        </g>
    </svg>
</div>
            <span class="nav-link-text ms-1">Teachers</span>
        </a>
      </li>
      
    </ul>
  </div>
</aside>
