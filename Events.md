# Events

### From symfony docs:
> Events... allow your application components to communicate with each other by dispatching events and listening to them.

### Events use a **mediator pattern**
> mediator pattern defines an object that encapsulates how a set of objects interact.

## Events in Drupal
> During the process of responding to a request, Drupal and the underlying Symfony components will trigger (or dispatch) various events, notifying any subscribers that now is the time to do their thing. 
> 
> Event subscribers respond to specific events being triggered and perform custom logic. 
> 
> You can subscribe to an event in order to be notified when the event occurs and execute custom code. Modules can dispatch new events so that other modules can extend and enhance critical functionality while remaining independent.