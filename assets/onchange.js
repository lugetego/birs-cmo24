let elm0 = document.getElementById('registro_viaje_0');
let elm1 = document.getElementById('registro_viaje_1');
let monto = document.getElementById('registro_monto');


document.getElementById("div_registro_monto").hidden = true;
document.getElementById("registro_viaje_0").addEventListener(
    "click",
    () => {
        if ( elm0.checked ) {
            document.getElementById("div_registro_monto").hidden = false;
            console.log(monto.value);
            monto.value= null;
        }
        else {
            document.getElementById("div_registro_monto").hidden = true;

        }
    },
    false
);

document.getElementById("registro_viaje_1").addEventListener(
    "click",
    () => {
        if ( elm1.checked ) {
            document.getElementById("div_registro_monto").hidden = true;
            console.log(monto.value);
            monto.value= null;
        }
        else {
            document.getElementById("div_registro_monto").hidden = false;


        }
    },
    false
);