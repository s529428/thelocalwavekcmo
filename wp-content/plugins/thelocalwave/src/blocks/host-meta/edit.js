import { useBlockProps } from "@wordpress/block-editor";
import { Panel, PanelBody, PanelRow, TextControl } from "@wordpress/components";
import { useSelect } from "@wordpress/data";
import { useEntityProp } from "@wordpress/core-data";

const Edit = () => {
	const blockProps = useBlockProps();
	const postType = useSelect(
		(select) => select("core/editor").getCurrentPostType(),
		[],
	);

	const [meta, setMeta] = useEntityProp("postType", postType, "meta");

	const firstName = meta?.first_name ?? "";

	const updateFirstName = (newValue) => {
		setMeta({ ...meta, first_name: newValue });
	};

	return (
		<div {...blockProps}>
			<Panel>
				<PanelBody>
					<PanelRow>
						<TextControl
							label="First Name"
							value={firstName}
							onChange={(newValue) => updateFirstName(newValue)}
						/>
					</PanelRow>
				</PanelBody>
			</Panel>
		</div>
	);
};

export default Edit;
