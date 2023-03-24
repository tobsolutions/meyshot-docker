/*
 * keyboard.js
 * Bildschirmtastatur mit JavaScript
 *
 * (c) IT-Maker 2014
 * http://www.it-maker.org
*/

function keyboard(divid){
	this.div = document.getElementById(divid);
	this.output = '';
	this.groesse = ''; //Wenn leer, dann wird klein geschrieben
	
	this.addKey = function(key, clas_s){
		// TODO Fügt einen einzelnen Buchstaben hinzu	
		this.div.innerHTML = this.div.innerHTML + ' <input type="button" class="' + clas_s + '" onclick="keyboard.keyPressed(this.value)" value="' + key + '">';
	}
	
	this.addBackspace = function(clas_s){
		// TODO Fügt einen zurück-Button (Backspace) ein
		this.div.innerHTML = this.div.innerHTML + ' <input type="button" class="' + clas_s + '" onclick="keyboard.keyPressed(\'BACKSPACE\')" value="&lArr;" style=\"width:60px;\">';
	}
	
	this.addCapsl = function(clas_s){
		// TODO Fügt einen CAPSLOCK-Button ein
		this.div.innerHTML = this.div.innerHTML + ' <input type="button" class="' + clas_s + '" onclick="keyboard.keyPressed(\'CAPS\')" value="&dArr;CAPS" style=\"width:60px;\">';
	}
	
	this.addShift = function(clas_s){
		// TODO Fügt einen Chift-Button ein
		this.div.innerHTML = this.div.innerHTML + ' <input type="button" class="' + clas_s + '" onclick="keyboard.keyPressed(\'SHIFT\')" value="&uArr;SHIFT" style=\"width:60px;\">';
	}
	
	this.addSpace = function(clas_s){
		// TODO Fügt einen Leertaste-Button ein
		this.div.innerHTML = this.div.innerHTML + ' <input type="button" class="' + clas_s + '" onclick="keyboard.keyPressed(\'SPACE\')" value=" " style=\"width:300px;\">';
	}
	
	this.addEnter = function(clas_s){
		// TODO Fügt einen Enter-Button ein
		this.div.innerHTML = this.div.innerHTML + ' <input type="button" class="' + clas_s + '" onclick="keyboard.keyPressed(\'ENTER\')" value="&#8629;" style=\"width:60px;\">';
	}
	
	this.br = function(){
		// TODO Erzeugt Zeilenumbruch
		this.div.innerHTML = this.div.innerHTML + '<br>';	
	}
	
	this.addHtml = function(html){
		// TODO Fügt HTML-Code an der aktuellen Stellen zw. den Tasten ein
		this.div.innerHTML = this.div.innerHTML + html;	
	}
	
	this.keyPressed = function(key){
		if(this.output == ''){
			//Keine Ausgabe festgelegt
			alert("Ausgabe festlegen:\nkeyboard.output = document.getElementById('out');");		
		}else{
			if(key == 'BACKSPACE'){
				this.output.value = this.output.value.substr(0, this.output.value.length-1);
			}else if(key == 'CAPS'){
				if(this.groesse == 'CAPS'){
					this.groesse = '';				
				}else{
					this.groesse = 'CAPS';				
				}
			}else if(key == 'SHIFT'){
				this.groesse = 'SHIFT';
			}else if(key == 'SPACE'){
				this.output.value = this.output.value + ' ';		
			}else if(key == 'ENTER'){
				keyboard_enter_pressed(this.output.id);

			}else{
				if(this.groesse == 'CAPS'){
					//groß schreiben + ausgeben
					this.output.value = this.output.value + key.toUpperCase();		
					
				}else if(this.groesse == 'SHIFT'){
					//groß schreiben + ausgeben + this.groesse = ''		
					this.output.value = this.output.value + key.toUpperCase();		
					this.groesse = '';
						
				}else{
					//klein schreiben		
					this.output.value = this.output.value + key.toLowerCase();		
				}	
			}
		}
	}
	
	this.addKeyboard = function(c){
		// TODO Fügt eine komplette Tastatur ein
		this.addKey('1', c);
		this.addKey('2', c);
		this.addKey('3', c);
		this.addKey('4', c);
		this.addKey('5', c);
		this.addKey('6', c);
		this.addKey('7', c);
		this.addKey('8', c);
		this.addKey('9', c);
		this.addKey('0', c);
		this.addKey('&szlig;', c);
		this.addKey('?', c);
		this.addBackspace(c);
		this.br();
		this.addKey('Q', c);
		this.addKey('W', c);
		this.addKey('E', c);
		this.addKey('R', c);
		this.addKey('T', c);
		this.addKey('Z', c);
		this.addKey('U', c);
		this.addKey('I', c);
		this.addKey('O', c);
		this.addKey('P', c);
		this.addKey('&Uuml;', c);
		this.addKey('*', c);
		this.addKey('+', c);
		this.br();
		this.addCapsl(c);
		this.addKey('A', c);
		this.addKey('S', c);
		this.addKey('D', c);
		this.addKey('F', c);
		this.addKey('G', c);
		this.addKey('H', c);
		this.addKey('J', c);
		this.addKey('K', c);
		this.addKey('L', c);
		this.addKey('&Ouml;', c);
		this.addKey('&Auml;', c);
		this.addKey('#', c);
		this.br();
		this.addShift(c);
		this.addKey('Y', c);
		this.addKey('X', c);
		this.addKey('C', c);
		this.addKey('V', c);
		this.addKey('B', c);
		this.addKey('N', c);
		this.addKey('M', c);
		this.addKey(',', c);
		this.addKey(';', c);
		this.addKey('.', c);
		this.addKey(':', c);
		this.addKey('-', c);
		this.addKey('_', c);
		this.br();
		this.addKey('!', c);
		this.addKey('&quot;', c);
		this.addKey('/', c);
		this.addSpace(c);
		this.addKey('@', c);
		this.addKey('&euro;', c);
		this.addEnter(c);
	}
}