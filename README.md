# blend-sample
This repo specifically details recent and/or applicable projects.

## Elohim
Elohim is a custom theme developed for MBU, built on the Genesis Framework.
## mbu-custom
Plugin for CPT and taxonomies. Runs on the GPLv3 framework by WebDev Studios
#### Highlights
- User Management
	- Capability CPT: I used WordPress core’s capability type to assign access to each CPT. I then mapped access to user roles to allow access to the capability type for each CPT.
	- Page Taxonomy: The hangup here was modifying access to the Page post type. To solve(ish) this, I created a page taxonomy. I restricted view of page_categories to each role. This drastically improved UI for web editors with a loophole that users could technically edit other pages via the frontend edit link.
- CPT: split much content into CPTs as opposed to storing everything in pages. Reduced page count from 900+ to 150. If the web editor didn’t need to see it, they didn’t see it. CPTs are also much easier to export selectively.
- Advanced Custom Fields: While not the right answer for every situation, ACF is used extensively to polish backend UI. Some use cases include hide/reveal toggle for post featured images (featured on <a href="https://fewerthanthree.com/hide-show-featured-image-specific-posts-genesis/">Fewer Then Three</a>) and a dropdown form selection to generate single form pages.  
- Task List
	- Attachments: Customized a notification to attach uploaded media on the form as an attachment on the Asana task.
	- Dynamically populated hidden field to add unique ID to each form submission.
