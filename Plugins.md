# Plugins

## What are plugins

### The problem:

> Interchangeable pieces of functionality within modules.. You can easily swap out functional bits. I.E: swapping out PHP email handling with a custom SMTP handler.
> 
> Plugins give Admins configurable options
> 
> Modules should provide options for functionality
> 

### Example Plugins
>
* Block: Add a new block that an administrator can place via the block layout UI
* Field formatter: Add a new option for display data contained in fields of a specific type(s)
* Field widget: Add a new form widget for collecting data for fields of a specific type(s)
* Menu link: Define a menu link
* Menu local task: Define a local task. For example, edit tabs on content pages
* Views field: Add a new field option to Views
* Views filter: Add a new filter option to Views



- Blocks: an administrative UI where one can place as many blocks on the page. Configuration options abound
	- Blocks provide content.
	- But where that content comes from depends on the plugin being used to generate content. 
- Field types, widgets, and formatters
- Text filters: Configuration options
- Views: Combines a bunch of configurable fields
- Plugins are options. 
- Image Styles 
	- Indvidual effect: plugin
	- Multiple image effects: plugin type
	- Collection of selectable image effects: plugin manager
	- Preview of the image: Plugin Consumer 

### The Plugin API   

* **Plugin**: An individual unit of functionality (a block, or a field formatter - module developers add new plugin instances)
* **Plugin Types**: Definition of what functionality is expected of a given type - groups of plugins
* **Plugin Manager**: Central controlling class for:
	* *Defining plugin types* 
	* *discovery and discovery decorators* 
	* *Factories for instantiation*
	* *Derivatives*
* **Plugin Consumer**: Custom code that leverages the functionality provided by plugins

### Plugins are more of a design pattern

> the Plugin API is more of template. Follow it as a recommended set of guidelines. 
> They are object-oriented and allow for extendability (instead of copy/paste code)