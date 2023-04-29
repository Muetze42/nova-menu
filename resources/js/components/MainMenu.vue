<template>
    <div
        v-if="hasItems"
        class="sidebar-menu pb-24 space-y-6"
        dusk="sidebar-menu"
        role="navigation"
    >
        <div>
            <input type="search" v-model="menuFilter">
        </div>
        <component
            :key="item.key"
            :is="item.component"
            v-for="(item, index) in filteredMainMenu"
            :item="item"
        />
<!-- Todo: Missing Section after sections & items should come back :( -->
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

    watch: {
        menuFilter(newValue, oldValue) {
            let search = newValue.toLowerCase()
            this.filteredMainMenu = this.mainMenu
            console.log(this.filteredMainMenu)

            if (search.length > 0) {
                console.log(this.filteredMainMenu)
                this.filteredMainMenu = this.filteredMainMenu.filter(function (item) {
                    if (item.name.toLowerCase().includes(search)) {
                        return true
                    }

                    if (item.items && item.items.length) {
                        item.items = item.items.filter(function (item) {
                            return item.name.toLowerCase().includes(search);
                        })
                    }

                    return item.items && item.items.length
                })
            }
        },
    },

    computed: {
        ...mapGetters(['mainMenu']),

        hasItems() {
            return this.mainMenu.length > 0
        },
    },
}
</script>
