<template>
     <li :class="dropdownClasses" class="nav-item" >
        <a @click="isDropdownOpen = ! isDropdownOpen"
        class="nav-link dropdown-toggle"
        :href="linkToNotifications">
            <span class="glyphicons glyphicons-bell">N</span>
            <span class="badge badge-light" v-if="notifications.length" v-text="notifications.length"></span>
        </a>
        <ul :class="isMenu" class="dropdown-menu-right" v-if="notifications.length">
            <li v-for="notification in notifications">
                <a @click="markAsRead(notification)"
                    class="dropdown-item"
                    :href="notification.data.link"
                    v-text="notification.data.text"></a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-item"><a class="dropdown-item" @click="markAllAsRead()" href="#">Marcar todo como leido</a></li>
            <li class="dropdown-item"><a class="dropdown-item" :href="linkToAllNotifications">Ver Todas las Notificaciones</a></li>
        </ul>
    </li>
</template>

<script>
    export default {
        data(){
            return {
                notifications: [],
                isDropdownOpen: false,
            }
        },
        mounted() {
            axios.get('notificaciones').then(res => {
                this.notifications = res.data;
            })
        },
        methods: {
            markAsRead(notification){
                axios.patch('/notificaciones/' + notification.id)
                .then(res => {
                this.notifications = res.data;
                });
            },
            markAllAsRead(){
                this.notifications.forEach(notification => {
                    this.markAsRead(notification);
                })
                // axion.patch('notificaciones')
            }
        },
        computed: {
            dropdownClasses(){
                return ['dropdown', this.isDropdownOpen ? 'show' : '']
            },
            isMenu(){
                return ['dropdown-menu', this.isDropdownOpen ? 'show' : '']
            },
            linkToNotifications(){
                return this.notifications.length ? '#' : "/notificaciones";
            },
            linkToAllNotifications(){
                return "/notificaciones";
            }
        }
    }
</script>
