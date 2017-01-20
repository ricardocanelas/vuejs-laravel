<template>
    <div class="notification is-warning" v-if="showModal" >
        <slot></slot>
        <ul>
            <li v-for="msg in messages">{{ msg[0] }}</li>
        </ul>
    </div>
</template>

<script>
    export default {

        props: {
            messages: { default: {} }
        },

        computed: {
            showModal: function(){
                return Object.keys(this.messages).length ? true : false;
            }
        }
    }
</script>
