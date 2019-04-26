# Mastering Drupal 8 Development

## Content Types
### Aquifer

- **Description**: The Aquifer content type holds information about aquifers throughout the world. We collect this data from a third-party service
- **Title field label**: Name
- **Preview before submitting**: disabled
- **Publishing options**: *Published, Create new revision*
- **Display Settings**: Don't display author and date information
- **Menu settings**: None

**FIELDS**

- Delete the Body field
- Plain text: *Aquifer coordinates (plain text)*
- List(text): *Aquifer status* (value|Label format)
	- empty|Empty
	- critical|Critical
	- low|Low
	- adequate|Adequate
	- full|Full
	- overflowing|Overflowing
- Plain text: *Aquifer volume* 