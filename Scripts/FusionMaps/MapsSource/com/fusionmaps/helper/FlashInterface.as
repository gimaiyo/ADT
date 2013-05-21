﻿import flash.external.ExternalInterface;
import mx.events.EventDispatcher;

/**
* @description
* <strong>Author:</strong> Robert Taylor<br />
* <strong>Version:</strong> 2.0.0<br />
* <strong>Created:</strong> 28 Oct 2006<br />
* <strong>Last Updated:</strong> 03 Dec 2006<br />
* <strong>Website: </strong><a href="http://www.flashextensions.com">http://www.flashextensions.com</a><br />
* <strong>Documentation: </strong><a href="http://www.flashextensions.com/products/flashinterface.php">http://www.flashextensions.com/products/flashinterface.php</a><br />
* <strong>Description: </strong>
* Provides the means to communicate directly between the Flash 8 and 9 ActionScript Virtual Machines (AVM).<br /><br />
* <i>FlashInterface AS2 Class</i>
* <ul>
* <li>Flash 8 to Flash 9 communication</li>
* <li>Flash 8 to Flash 8 communication</li>
* </ul>
* <i>FlashInterface AS3 Class</i>
* <ul>
* <li>Flash 9 to Flash 8 communication</li>
* <li>Flash 9 to Flash 9 communication</li>
* </ul>
* Flash 9 player has been developed with a new ActionScript Virtual Machine (AVM). Versions of 
* the Flash player 8 and lower run under the first AVM. The two virtual 
* machines do not support direct communication back and forth with each other.
* FlashInterface establishes a means for the two virtual machines to
* communicate directly with each other, both synchronously and asynchronously.
*/

class com.fusionmaps.helper.FlashInterface extends Object
{
	private static var flashIdList:Object = new Object();
	private static var staticInit:Boolean = false;
	private static var __swfID:String = getSWFId();

	/**
	* Method; registers a listener object with a component instance that is broadcasting 
	* an event. When the event occurs, the listener object or function is notified. 
	* FlashInterface uses the EventDispatcher provided by the Flash framework. You many look up 
	* the documentation regarding its usage for any specific details.
	* @param	event:String a string that is the name of the event.
	* @param	listener:Object a reference to a listener object or function. 
	* @return 	Nothing.
	* @usage
	* <pre>
	* import flx.events.FlashInterface;
	* FlashInterface.addEventListener("message", messageHandler);
	* 
	* function messageHandler(evt:Object)
	* {
	* 	FlashInterface.alert("You said", evt.data);
	* }
	* </pre>
	*/
	public static function addEventListener(event:String, listener:Object):Void
	{
		var flashId:String = getId(_root);
		setup(flashId);	
		flashIdList[flashId].registry.addEventListener(event, listener);
		ExternalInterface.call("addAVMListener", __swfID, flashId, event)
	}
	
	/**
	* Method; unregisters a listener object from a FlashInterface instance that is broadcasting 
	* an event. 
	* FlashInterface uses the EventDispatcher provided by the Flash framework. You many look up 
	* the documentation regarding its usage for any specific details.
	* @param	event:String a string that is the name of the event.
	* @param	listener:Object a reference to a listener object or function. 
	* @return 	Nothing.
	* @usage
	* <pre>
	* import flx.events.FlashInterface;
	* FlashInterface.removeEventListener("message", messageHandler);
	* </pre>
	*/
	public static function removeEventListener(event:String, listener:Object):Void
	{
		var flashId:String = getId(_root);
		setup(flashId);
		flashIdList[flashId].registry.removeEventListener(event, listener);
		ExternalInterface.call("removeAVMListener", __swfID, flashId, event)
	}
	
	/**
	* Method; dispatches an event to any listener registered with an instance of the class. This 
	* method is usually called from within a component's class file.
	* FlashInterface uses the EventDispatcher provided by the Flash framework. You many look up 
	* the documentation regarding its usage for any specific details.
	* @param	eventObject:Object A reference to an event object. The event object must have a 
	* type property that is a string indicating the name of the event. Generally, the event object 
	* also has a target property that is the name of the instance broadcasting the event. You can 
	* define other properties on the event object that help a user capture information about the 
	* event when it is dispatched. 
	* @return 	Nothing.
	* <pre>
	* import flx.events.FlashInterface;
	* FlashInterface.dispatchEvent({type:"message", data:"Hello, world!"});
	* </pre>
	*/
	public static function dispatchEvent(eventObject:Object):Void
	{		
		ExternalInterface.call("dispatchAVMEvent", eventObject);
	}
		
	/**
	* Method; event handler for dispatched events. This handler will dispatch to all subscribing objects to
	* a particlular event. The event object contains the following data:
	* 	type event dispatched
	* 	data value containing any data to be evaluated by each event handler.
	* @param	flashId:String the id associated to the swf through html.
	* @param	eventObject:Object A reference to an event object.
	* @return 	Nothing.
	*/
	private static function dispatchHandler(flashId:String, eventObject:Object):Void
	{
		flashIdList[flashId].registry.dispatchEvent(eventObject);
	}
		
	/**
	* Method; sets a control so it can be accessed through the call method. Public 
	* properties and methods may be accessed once a control has been registered.
	* @param	id:String the unique identifier by which an item may be referenced.
	* @param	target:Object the control object being registered.
	* @param	overwrite:Boolean overrides a previously registered control wil the same ID.
	* @return	Boolean returns if the registration was successful.
	* <pre>
	* import flx.events.FlashInterface;
	* FlashInterface.register("flash", this);
	* 
	* function sendMessage(message:String):Void
	* {
	* 	FlashInterface.alert("You said", message);
	* }
	* </pre>
	*/
	public static function register(id:String, target:MovieClip, overwrite:Boolean):Boolean
	{	
		var flashId:String = getId(target);
		setup(flashId);
		
		if(overwrite)
		{
			flashIdList[flashId].registry[id] = target;
			return true;
		}
			
		if(flashIdList[flashId].registry[id] == null)
		{
			flashIdList[flashId].registry[id] = target;
			return true;	
		}
		
		return false;
	}
	
	/**
	* Method; removes a control from being accessed through the call method.
	* @param	flashId:String the id associated to the swf through html.
	* @param	id:String the unique identifier by which an item may be referenced.
	* @return	Boolean returns if the unregistration was successful.
	* <pre>
	* import flx.events.FlashInterface;
	* FlashInterface.unregister("demo", "flash");
	* </pre>
	*/
	public static function unregister(flashId:String, id:String):Boolean
	{
		setup(flashId);
		
		if(flashIdList[flashId].registry[id])
		{
			delete flashIdList[flashId].registry[id];
			return true
		}
		return false;
	}
	
	/**
	* Method; invokes synchronous calls to public methods and properties of registered
	* controls and receives and returns values.
	* @param	path:String path to the method or property.
	* @param	args...n Any additional parameters you which to pass in the call
	* @return	Object containing information regarding the event call.
	* <pre>
	* import flx.events.FlashInterface;
	* FlashInterface.call("flash.sendMessage", "Hello, world!");
	* </pre>
	*/
	public static function call(path:String):Object
	{			
		var pathList:Array = path.split(".");
		var flashId:String = pathList.shift().toString();
				
		var sID:String, rID:String;
		if(flashId == "root")			// Talking to Flash 9 container
		{
			rID = __swfID;
			sID = __swfID;
		}
		else 
		{
			var ids:Array = getSWFIds();
			for(var e:String in ids)
			{
				if(ids[e] == flashId)
				{
					rID = __swfID;
					sID = pathList.shift().toString();
					break;
				}
			}
			if(rID == null || sID == null)
			{
				rID = flashId;
				sID = flashId;
			}
		}

		path = pathList.join(".");
		var args:Array = arguments.slice(1);
		for(var e:String in args)
			if(args[e] == "") args[e] = "$empty";
		
		//alert("path", path);
		//alert("getSWF('" + sID + "').callFlash_" + rID);
		return ExternalInterface.call("getSWF('" + rID + "').callFlash_" + sID, rID, path, args);	
	}
	
	/**
	* Methods; event handler for call events. Both properties and methods calls are controlled and maintiained
	* with this handler. 
	* @param	flashId
	* @param	path
	* @param	args
	* @return	Object containing information regarding the event call.
	*/
	private static function callHandler(flashId:String, path:String, args:Array):Object
	{	
		var resultObject:Object = new Object();
		resultObject.target = target;
		resultObject.type = type;
		resultObject.status = "error";
					
		// if we have not published the swf and another item is trying
		// directly to it, then return an error.
		if(!flashIdList[flashId].swf)
		{
			resultObject.message = "SWF has not been made public.";
			return resultObject;
		}		
		
		// path variations are as follows:
		// refID.METHOD
		// refID.path...n.METHOD
		// path...n.METHOD
		// refID.PROPERTY
		// refID.path...n.PROPERTY
		// path...n.PROPERTY
		
		// This functionality resolves if the item was stored in the registry.
		// If it was then we resolve any target paths by using the registered item as a starting point
		// If it wasn't we check to see if the item can be resolved from the root
		// Once we find the control, we resolve the type as a method or property
		// We then carry out the action by passing any arguments to the method or property
		
		
		var pathItems:Array = path.split("."); 			
		var target:String = pathItems[0].toString();
		var type:String = pathItems.pop().toString();
		
		var rTarget:Object = flashIdList[flashId].registry[target];
				
		if(rTarget == null)
		{
			var targetPath:Object = flashIdList[flashId].swf;

			var len:Number = pathItems.length;
			for(var n:Number=0;n<len;n++)
				targetPath = targetPath[pathItems[n]];
				
			if(targetPath == null)
			{
				resultObject.message = "Target does not exist";
				alert(1, flashId)
				return resultObject;
			}
			rTarget = targetPath;
		}
		else
		{
			pathItems.shift();
			var len:Number = pathItems.length;
			for(var n:Number=0;n<len;n++)
				rTarget = rTarget[pathItems[n]];
			
			if(rTarget == null)
			{
				resultObject.message = "Target does not exist";
				return resultObject;
			}
		}
		
		for(var e:String in args)
		{
			if(args[e] == "$empty") args[e] = "";			
		}
		
		if(typeof(rTarget[type]) == "function")
		{
			resultObject.result = rTarget[type].apply(rTarget, args)
		}
		else
		{
			if(args.length < 1)
				resultObject.result = rTarget[type];
			else
				resultObject.result = rTarget[type] = args[0]
		}
		
		resultObject.status = "success";
		return resultObject;	
	}	

	/**
	* Method; used for debugging and providing error messages.
	* @param args...n - any number of parameters may be passed in. Each parameter will be divided with a space.
	* @usage
	* <pre>
	* import flx.events.FlashInterface;
	* FlashInterface.alert("Hello, world!");
	* </pre>
	*/
	public static function alert():Void
	{
		trace(arguments.join(" : "));
		ExternalInterface.call('alert', arguments.join(" : "));
	}
	
	/**
	* Method; finds a id based on the following conditions:
	* 1) "flashId" is defined
	* 2) finds id from HTML
	* 3) creates an id based on SWF name (should never get here)
	* @return String returns a unique id.
	*/
	private static function getId(control:MovieClip):String
	{
		var root = control
		if(root.flashId == null)
		{	
			root.flashId = __swfID;
			if(root.flashId == null)
				root.flashId = getSWFName(root);
		}
		return root.flashId;
	}
	
	/**
	* Method; retrieves a list of SWFs' id's located in the HTML page
	* @return Array list of swf ids.
	*/	
	private static function getSWFIds():Array
	{
		return Array(ExternalInterface.call("getSWFIds"));
	}		
	
	/**
	* Method; returns a uniqueID based on the SWF name. For example, if the SWF is named, "myapp.swf",
	* the return id will be "myapp". This is a simple way of creating an id for getInstance.
	* You can alternatively create your own unique ID by setting "flashId" on the _root. The ID is 
	* how external Flash 8 SWFs or Flash 9 SWFs will communicate with you SWF application.
	* @return String - returns a unique id based on the swf name.
	* 
	* How an ID is established:
	* 1) Attempt to read read "flashId" from SWF - This can be done by assigning it through:
	* 		a) URL - flash.swf?flashId=flash_1
	* 		b) FlashVar - SWFObject example: so.addVariable("flashId", "flash_1"); 
	* 		c) _root - flashId = "flash_1";
	* 3) Attempt to read id from HTML
	* 4) Read swf name as id - (i.e products.swf => products)
	*/	
	private static function getSWFName(control:MovieClip):String
	{
		var swfItem = control._root._url.split("/").join("|").split("\\").join("|").split("|").pop();
		if(swfItem.indexOf("?") != -1)
			swfItem = swfItem.split("?").shift();
		swfItem = swfItem.split(".swf").join("").split("#").shift();
		
		return unescape(swfItem);	
	}
	
	/**
	* Method; finds the id assigned to the root SWF. 
	* This function developed and provided courtesy of Tyler Wright (codext.com).
	* AS 3.0 implementation by Robert Taylor.
	* @return
	*/
	private static function getSWFId():String
	{
		var swfUID:String = "swf" + (Math.random() * 999999);
		ExternalInterface.addCallback(swfUID, null, function(){});
		var location:Object = ExternalInterface.call("SWFInfo.locateSWF", swfUID);
		
		if(!location)
		{
			location = ExternalInterface.call("eval",
			"(window.SWFInfo = {"+
				"locateSWF:function(swfUID) {"+
					"var swfobjects = document.getElementsByTagName('embed');"+
					"if(!swfobjects.length) swfobjects = document.getElementsByTagName('object');"+
					"for(var i=0; i<swfobjects.length; i++) {"+
						"var name = swfobjects[i].name ? swfobjects[i].name : swfobjects[i].id;"+
						"if(document[name] && document[name][swfUID]) {"+
							"return name;"+
						"}"+
					"}"+
					"return null;"+
				"}"+
			"}).locateSWF('" + swfUID + "');");
		}
		
		var id:String = location ? String(location) : null
		return id;		
	}
	
	/**
	* Method; instantiates the needed JavaScript and EventDispatcher in order to perform any
	* dispatching and/or calls to other SWFs. This function must be called before any other actions
	* with FlashInterface.
	* @return	Nothing.
	*/
	public static function publish(root:MovieClip, makePublic:Boolean):Void
	{
		var flashId = getId(root);
		setup(flashId);
		if(makePublic)
			flashIdList[flashId].swf = root;
		else
			delete flashIdList[flashId].swf;
	}
	
	/**
	 * Method; embeds JavaScript into current HTML.
	 */	
	private static function setupEIFunctions():Void
	{
		if(!staticInit)
		{
			staticInit = true;
			
			if(ExternalInterface.call("eval", "$avms"))
				return;			
					
			var str:String = "";			
			
			str += "function getSWF(swfId)";
			str += "{";
			str += "	if (navigator.appName.indexOf('Microsoft') != -1)";
			str += "		return window[swfId];";
			str += "	return document[swfId];";
			str += "};";	
			
			str += "function getSWFIds()";
			str += "{";
			str += "	var swfobjects = document.getElementsByTagName('embed');";
			str += "	if(!swfobjects.length) swfobjects = document.getElementsByTagName('object');";
			str += "	var list = new Array();";
			str += "	for(var i=0; i<swfobjects.length; i++)";
			str += "		list.push(swfobjects[i].name ? swfobjects[i].name : swfobjects[i].id);";
			str += "	return list;";
			str += "};";
				
			str += "var $avms = new Object();";
			str += "function addAVMListener(swfId, flashId, event)";
			str += "{";
			str += "	if($avms[event] == null)";
			str += "		$avms[event] = new Object();";
			str += "	if($avms[event][swfId] == null)";
			str += "		$avms[event][swfId] = new Object();";
			str += "	$avms[event][swfId][flashId] = event;";
			str += "};";

			str += "function removeAVMListener(swfId, flashId, event)";
			str += "{";
			str += "	delete $avms[event][swfId][flashId];";
			str += "};";

			str += "function dispatchAVMEvent(evt)";
			str += "{";
			str += "	var type = evt.type;";
			str += "	var swfList = $avms[type];";
			str += "	for(var e in swfList)";
			str += "	{";
			str += "		var flashList = swfList[e];";
			str += "		for(var f in flashList)";
			str += "		{";
			str += "			getSWF(e)['dispatchFlash_' + f](f, evt);";
			str += " 		}";
			str += "	}";
			str += "};";		
			
			ExternalInterface.call("eval", str);		
		}		
	}
	
	/**
	* Method; sets up the ExternalInterface callback handlers for communicating with the SWF.
	* @param	id:String the flash id associated to this SWF.
	* @return 	Boolean indicates if it was successful or not.
	*/
	private static function setup(id:String):Boolean
	{	
		setupEIFunctions();

		if(id == null)
			return false;
	
		if(flashIdList[id] == null)
		{
			flashIdList[id] = new Object();
			flashIdList[id].dispatchHandler = dispatchHandler;
			flashIdList[id].callHandler = callHandler;
			flashIdList[id].registry = new Object();
			
			EventDispatcher.initialize(flashIdList[id].registry);
			
			ExternalInterface.addCallback("dispatchFlash_" + id, flashIdList[id], flashIdList[id].dispatchHandler);
			ExternalInterface.addCallback("callFlash_" + id, flashIdList[id], flashIdList[id].callHandler);		
		}
		
		return true;		
	}
}