import Swal from "sweetalert2";
import CrudHelper from "./modulos/crudHelper.js";
import Sortable from 'sortablejs';

window.Swal = Swal;

window.crudHelper = new CrudHelper();

var lista = document.getElementsByClassName('ordenavel');

for (let i = 0; i < lista.length; i++) {
    Sortable.create(lista[i], {
        handle: '.handle',
        animation: 150,
        store: {
            set: function (sortable) {
                var order = sortable.toArray();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: lista[i].dataset.rota,
                    data: {
                        ordem: order
                    },
                    type: 'POST',
                    dataType: 'json'
                });
            }
        }
    });
}
