const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

registerBlockType('my-plugin/my-custom-block', {
    edit({ attributes, setAttributes }) {
        const onChangeContent = (content) => {
            setAttributes({ content });
        };
        return (
            <RichText
                tagName="p"
                value={attributes.content}
                onChange={onChangeContent}
            />
        );
    },
    save({ attributes }) {
        return (
            <RichText.Content
                tagName="p"
                value={attributes.content}
            />
        );
    },
});
