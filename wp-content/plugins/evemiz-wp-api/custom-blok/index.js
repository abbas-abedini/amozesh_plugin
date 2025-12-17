import { registerBlockType } from '@wordpress/blocks';

registerBlockType('wp-api/price-block', {
    edit() {
        return <p>بلوک قیمت (نمایش در فرانت‌اند)</p>;
    },
    save() {
        return null; // چون رندر سمت سرور انجام می‌شود
    }
});
