import FormComponent from './components/FormComponent';

class App {
    constructor() {
        this.init();
    }

    init() {
        let component = new FormComponent();

        component.formHandler();
    }
}

document.addEventListener('DOMContentLoaded', () => new App());
