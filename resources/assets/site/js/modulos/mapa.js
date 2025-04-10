class Mapa {

    constructor(latitude, longitude, zoom) {

        this.latitude = latitude;
        this.longitude = longitude;
        this.zoom = zoom;
        this.marcadores = [];

        this.api = L.map('map').setView([this.latitude, this.longitude], this.zoom);
        this.api.scrollWheelZoom.disable();

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            // scrollWheelZoom: false,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(this.api);
    }

    InserirMarcador(latitude, longitude, texto, icone) {

        let LeafIcon = L.Icon.extend({
            options: {
                iconSize: [32, 39]
            }
        });

        let Icone = new LeafIcon({
            iconUrl: icone
        });

        let marcador = L.marker([latitude, longitude], {
            icon: Icone
        }).bindPopup(texto).addTo(this.api);

        this.marcadores.push(marcador);

    }

    RemoverTodosMarcadores() {

        for (var i = 0; i < this.marcadores.length; i++) {

            this.api.removeLayer(this.marcadores[i]);

        }
    }
}

export default Mapa;
