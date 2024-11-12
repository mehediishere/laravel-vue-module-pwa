import { defineStore } from 'pinia';

export const usePosStore = defineStore('pos', {
    state: () => ({
        counter: 0,
    }),
    actions: {
        increment() {
            this.counter++;
        },
    },
});
