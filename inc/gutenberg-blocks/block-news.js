const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

registerBlockType('your-namespace/your-custom-block', {
    title: 'Your Custom Block',
    icon: 'format-image',
    category: 'common',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
    },
    edit: function(props) {
        const { attributes, setAttributes } = props;
        return (
            <RichText
                tagName="p"
                value={attributes.content}
                onChange={content => setAttributes({ content })}
            />
        );
    },
    save: function(props) {
        const { attributes } = props;
        return <RichText.Content tagName="p" value={attributes.content} />;
    },
});
