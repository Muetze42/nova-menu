type AdvancedItems = Array<MenuGroup | MenuItem | MenuList | AdvancedMenuGroup | AdvancedMenuItem | AdvancedMenuList | AdvancedMenuSection | AdvancedMenuCard | AdvancedMenuDisclosure>

export interface AdvancedMenuCard {
    component: string
    section: string
    content: string | null
    tooltip: string | null
    classes: {
        filterClass: string
        card: string[]
    }
    styles: { [key: string]: string }
    keywords: string[]
    filterClass: string
    notFilterable: boolean
}

export interface AdvancedMenuDisclosure {
    component: string
    icons: {
        fontawesome: string | null
        heroicon: string | null
        image: string | null
        html: string | null
        height: number
        classes: AdvancedClasses
    }
    classes: AdvancedClasses
    isCustom: boolean
}

export interface AdvancedMenuGroup extends MenuGroup, AdvancedMenuElement {
    items: AdvancedItems
}

export interface AdvancedMenuItem extends MenuItem, AdvancedMenuElement {
    //
}

export interface AdvancedMenuList extends MenuList, AdvancedMenuElement {
    items: AdvancedItems
}

export interface AdvancedMenuSection extends MenuSection, AdvancedMenuElement {
    items: AdvancedItems
}

interface AdvancedMenuElement {
    tooltip: string | null
    iframe: Iframe
    keywords: string[]
    filterClass: string
    notFilterable: boolean
    icons: {
        fontawesome: string | null
        heroicon: string | null
        image: string | null
        html: string | null
        height: number
        classes: AdvancedClasses
    }
    classes: AdvancedClasses
}

interface AdvancedClasses {
    elem: string | string[]
    icon: string | string[]
    label: string | string[]
    filterClass: string
}

interface Iframe {
    target: string | null
    wrapper: {
        classes: string[]
        styles: { [key: string]: string }
    }
    iframe: {
        classes: string[]
        styles: { [key: string]: string }
    }
}

export interface Badge {
    value: string
    typeClass: string
}

export interface Collapsable {
    collapsable: boolean
    collapsedByDefault: boolean
}

type Items = Array<MenuGroup | MenuItem | MenuList>

export interface MenuGroup extends Collapsable {
    component: string
    items: Items
    key: string
    name: string
}

export interface MenuItem {
    active: boolean
    badge: Badge | null
    component: string
    data: { [key: string]: string } | null
    external: boolean
    headers: { [key: string]: string } | null
    method: string
    name: string
    path: string
    target: string | null
}

export interface MenuList {
    component: string
    items: Items
}

export interface MenuSection extends Collapsable {
    active: boolean
    badge: Badge | null
    component: string
    icon: string | null
    items: Items
    key: string
    name: string
    path: string
}
