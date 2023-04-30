<template>
    <div
        v-if="hasItems"
        class="sidebar-menu pb-24 space-y-6"
        dusk="sidebar-menu"
        role="navigation"
    >
        <div class="menu-search">
            <input type="search" v-model="menuFilter">
        </div>
        <component
            :key="item.key"
            :is="item.component"
            v-for="(item, index) in filteredMainMenu"
            :item="item"
        />
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: 'MainMenu',

    data() {
        return {
            menuFilter: null,
            filteredMainMenu: null,
        }
    },

    mounted() {
        console.log(this.$page.props)
    },

    watch: {
        menuFilter(newValue) {
            let search = newValue.toLowerCase()
            this.filteredMainMenu = this.mainMenu

            if (search.length > 0) {
                this.filteredMainMenu = this.filteredMainMenu.filter(function (item) {
                    if (item.name && item.name.toLowerCase().includes(search)) {
                        return true
                    }

                    if (item.content && item.content.toLowerCase().includes(search)) {
                        return true
                    }

                    if (item.items && item.items.length) {
                        for (let child of item.items) {
                            if (child.name && child.name.toLowerCase().includes(search)) {
                                return true
                            }
                            if (child.content && child.content.toLowerCase().includes(search)) {
                                return true
                            }
                        }
                    }

                    return false
                })
            }
        },
        mainMenu(newValue, oldValue) {
            console.log(this.mainMenu)
            this.filteredMainMenu = this.mainMenu
        }
    },

    computed: {
        ...mapGetters(['mainMenu']),

        hasItems() {
            return this.mainMenu.length > 0
        },
    },
}
</script>
