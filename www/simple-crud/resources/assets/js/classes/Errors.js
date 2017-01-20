export default class Errors {

    constructor() {
        this.errors = {};
    }

    record(errors) {
        this.errors = errors;
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    getAll() {
        return this.errors;
    }

    clear(field) {
        if (field) {
            delete this.errors[field];
            return;
        }

        this.errors = {};
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    isValid() {
        return Object.keys(this.errors).length === 0;
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }
}