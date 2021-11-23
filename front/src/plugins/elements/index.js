import Vue from "vue";


import 'element-ui/packages/theme-chalk/lib/index.css';
import {
    Pagination, Dialog, Autocomplete, Dropdown, DropdownMenu, DropdownItem,  Menu, Submenu, MenuItem, MenuItemGroup, Input, InputNumber, Radio, RadioGroup,
    RadioButton, Checkbox, CheckboxButton, CheckboxGroup, Switch, Select, Option, OptionGroup, Button, ButtonGroup,  Table, TableColumn,  DatePicker, TimeSelect,
    TimePicker, Popover, Tooltip, Breadcrumb, BreadcrumbItem, Form, FormItem, Tabs, TabPane, Tag, Tree, Alert, Slider, Icon, Row, Col, Upload, Progress, Spinner,
    Badge, Card, Rate, Steps, Step, Carousel, CarouselItem, Collapse, CollapseItem, Cascader, ColorPicker, Transfer, Container, Header, Aside, Main, Footer, Timeline,
    TimelineItem, Link, Divider, Image, Calendar, Backtop, PageHeader, CascaderPanel
} from 'element-ui';

const elements = [
    Pagination, Dialog, Autocomplete, Dropdown, DropdownMenu, DropdownItem,  Menu, Submenu, MenuItem, MenuItemGroup, Input, InputNumber, Radio, RadioGroup,
    RadioButton, Checkbox, CheckboxButton, CheckboxGroup, Switch, Select, Option, OptionGroup, Button, ButtonGroup,  Table, TableColumn,  DatePicker, TimeSelect,
    TimePicker, Popover, Tooltip, Breadcrumb, BreadcrumbItem, Form, FormItem, Tabs, TabPane, Tag, Tree, Alert, Slider, Icon, Row, Col, Upload, Progress, Spinner,
    Badge, Card, Rate, Steps, Step, Carousel, CarouselItem, Collapse, CollapseItem, Cascader, ColorPicker, Transfer, Container, Header, Aside, Main, Footer, Timeline,
    TimelineItem, Link, Divider, Image, Calendar, Backtop, PageHeader, CascaderPanel
];

// locale.use(lang);

elements.forEach(El => Vue.use(El, {
    // locale
}));