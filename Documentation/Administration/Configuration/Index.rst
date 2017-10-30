.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _administration-configuration:

Configuration
=============

Typoscript-Constants
^^^^^^^^^^^^^^^^^^^^

Change the values in Template->Constant Editor, if wanted.
Create your own template and input the new path, if wanted::

	plugin.tx_pbttaddressgooglemaps_addresslist {
		view {
			# cat=plugin.tx_pbttaddressgooglemaps_addresslist/file; type=string; label=Path to template root (FE)
			templateRootPath = EXT:pb_tt_address_googlemaps/Resources/Private/Templates/
			# cat=plugin.tx_pbttaddressgooglemaps_addresslist/file; type=string; label=Path to template partials (FE)
			partialRootPath = EXT:pb_tt_address_googlemaps/Resources/Private/Partials/
			# cat=plugin.tx_pbttaddressgooglemaps_addresslist/file; type=string; label=Path to template layouts (FE)
			layoutRootPath = EXT:pb_tt_address_googlemaps/Resources/Private/Layouts/
		}
		settings{
			# Google ApiKey has to be defined in extension configuration
			address{
				viewOptions{
					# cat=plugin.tx_pbttaddressgooglemaps_addresslist/file; type=string; label=Image width in frontend
					image{
						width = 180
					}
					# cat=plugin.tx_pbttaddressgooglemaps_addresslist/file; type=string; label=Wrap headlines in frontend
					wrapHeadlines = <h2>|</h2>
				}
			}
		}
	}


