<template>
    <div>

        <h1 class="title is-1">Posts</h1>

        <div class="columns">

            <div class="column is-7">

                <list></list>

            </div>

            <div class="column is-5">

                <transition name="fade" mode="out-in">
                    <keep-alive>
                        <router-view></router-view>
                    </keep-alive>
                </transition>

            </div>

        </div>
    </div>

</template>

<script>
    import List from './list.vue'

    export default{
        data(){
            return{
                msg:'hello vue'
            }
        },
        components:{
            'list':List
        }
    }

</script>
