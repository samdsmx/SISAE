<div>
    <h2> Te has registrado exitósamente</h2>
    <h3> Los datos con los que te registraste son: </h3>
    <ul>
        <li>
            Nombre: <span><?php print $_SESSION[EGRESADO][PERSONAL]['apPaterno'];
                                print ' ';
                                print $_SESSION[EGRESADO][PERSONAL]['apMaterno'];
                                print ' ';
                                print $_SESSION[EGRESADO][PERSONAL]['nombre'];                                
                          ?> </span>
        </li>
        <li>
            Correo: <span><?php print $_SESSION[EGRESADO][PERSONAL]['email'];?> </span>
        </li>
        <li>
            Carrera: <span><?php print $carrera->carrera;?> </span>
        </li>
    </ul>
</div>