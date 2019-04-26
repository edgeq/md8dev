# Hooks

> Hooks allow modules to alter/extend the beahavior of Drupal core or another module without modifying existing code. 
> 
> Loops that check for alterable/extendable moments at runtime.
> 
> Each hook has a unique name (example: `hook_entity_load()`), a defined set of parameters, and a defined return value.
> 
> Every hook has three parts; a name, an implementation, and a definition
> 
> More efficient than hacking core. Serves as a bridge between core and customization.

## Types of Hooks

- Hooks that **react to events** (hooks are like handlers)
- Hooks that **answer questions**
- Hooks that **alter existing data** 

## Define Hooks When...

- Code is making a list of options
- Code is performing a critical action that others might want to react to (CRUD)
- Your code has assembled and is about to use a complex set of data (content access configuration)

