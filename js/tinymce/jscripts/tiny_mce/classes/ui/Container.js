/**
 * $Id: Container.js 1176 2009-08-04 09:42:14Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright � 2004-2008, Moxiecode Systems AB, All rights reserved.
 */

/**
 * This class is the base class for all container controls like toolbars. This class should not
 * be instantiated directly other container controls should inherit from this one.
 *
 * @class tinymce.ui.Container
 * @extends tinymce.ui.Control
 */
tinymce.create('tinymce.ui.Container:tinymce.ui.Control', {
	/**
	 * Base contrustor a new container control instance.
	 *
	 * @constructor
	 * @method Container
	 * @param {String} id Control id to use for the container.
	 * @param {Object} s Optional name/value settings object.
	 */
	Container : function(id, s) {
		this.parent(id, s);

		/**
		 * Array of controls added to the container.
		 *
		 * @property controls
		 * @type Array
		 */
		this.controls = [];

		this.lookup = {};
	},

	/**
	 * Adds a control to the collection of controls for the container.
	 *
	 * @method add
	 * @param {tinymce.ui.Control} c Control instance to add to the container.
	 * @return {tinymce.ui.Control} Same control instance that got passed in.
	 */
	add : function(c) {
		this.lookup[c.id] = c;
		this.controls.push(c);

		return c;
	},

	/**
	 * Returns a control by id from the containers collection.
	 *
	 * @method get
	 * @param {String} n Id for the control to retrive.
	 * @return {tinymce.ui.Control} Control instance by the specified name or undefined if it wasn't found.
	 */
	get : function(n) {
		return this.lookup[n];
	}
});

