import { registerBlockType } from '@wordpress/blocks';

import meta from './block.json';
import Edit from './edit';

registerBlockType(meta.name, {
    ...meta,
    edit: Edit,
    save: () => {return null;}
});