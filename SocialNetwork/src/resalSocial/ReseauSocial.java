package resalSocial;

import java.util.ArrayList;
import java.util.Collection;
import java.util.Observable;
import java.util.Set;

import facebookGhost.FacebookGhostNetwork;
import facebookGhost.RelationEvent;
import facebookGhost.User;
import facebookGhost.UserEvent;
import grapheSimple.GrapheSimple;
import grapheSimple.ParcoursSimple;
import grapheX.Sommet;
import reseauSocial.core.MemberInterface;
import reseauSocial.core.SocialNetworkInterface;

public class ReseauSocial implements SocialNetworkInterface{
	String nom;
	GrapheSimple g = new GrapheSimple();
	FacebookGhostNetwork autreReseau ;
	
	public ReseauSocial(String nom){this.nom = nom;}

	@Override
	public void update(Observable arg0, Object arg1) {
		if(arg0 == autreReseau){
			if(arg1 instanceof UserEvent){
				UserEvent uEv = (UserEvent)arg1;
				this.addMember(uEv.getUser().getName(), true);
			}
			if(arg1 instanceof RelationEvent){
				RelationEvent rEv = (RelationEvent) arg1;
				 	if(rEv.getNature() == "family"){
				 		relate(2,getMember(rEv.getU1().getName()),getMember(rEv.getU2().getName()));
				 		relate(2,getMember(rEv.getU2().getName()),getMember(rEv.getU1().getName()));
				 	}
				 	if(rEv.getNature() == "Friend"){
				 		relate(3,getMember(rEv.getU1().getName()),getMember(rEv.getU2().getName()));
				 		relate(3,getMember(rEv.getU2().getName()),getMember(rEv.getU1().getName()));
				 	}
			}
		}
	}

	@Override
	public MemberInterface getMember(String identifier) {
		try{
			return (MemberInterface) g.getSommet(identifier);
		}catch(Exception e){
			return null;
		}
	}

	@Override
	public Collection<? extends MemberInterface> getMembers() {
		try{
			return (Collection<? extends MemberInterface>) g.sommets();
		}catch(Exception e){
			return null;
		}
	}

	@Override
	public MemberInterface addMember(String identifier, int age, String description) {
		Membre m = new Membre(identifier,age,description);
		g.ajouterSommet(m);
		return m;
	}

	@Override
	public MemberInterface addMember(String ident, boolean belongsToAnotherNetwork) {
		if(belongsToAnotherNetwork){
			if(getMember(ident) != null) {
				return null;
			}
			User u = autreReseau.getUser(ident);
			if(u==null)
				return null;
			MemberInterface m = addMember(u.getName(),u.getAgeRange().getAge(),u.myProfil());
			ArrayList<User> friends = u.getFriends();
			ArrayList<User> family = u.getFamily();
			
			for (int i=0; i<friends.size(); i++) {
				if(getMember(friends.get(i).getName()) != null) {
					relate(3, getMember(m.ident()), getMember(friends.get(i).getName()));
					relate(3, getMember(friends.get(i).getName()), getMember(m.ident()));
				}
			}
			
			for (int i=0; i<family.size(); i++) {
				if(getMember(family.get(i).getName()) != null) {
					relate(2, getMember(m.ident()), getMember(family.get(i).getName()));
					relate(2, getMember(family.get(i).getName()), getMember(m.ident()));
				}
			}
			
			return m;
		}
		return null;
	}

	@Override
	public void relate(int force, MemberInterface member, MemberInterface friend) {
		g.ajouterArc((Sommet) member, (Sommet) friend, force);
	}

	@Override
	public Set<? extends MemberInterface> relateToRank(MemberInterface member, int rank) {
		ParcoursSimple parcours = new ParcoursSimple(g);
		return (Set<? extends MemberInterface>) parcours.voisinsAuRang((Sommet) member, rank);
	}

	@Override
	public int distance(MemberInterface member1, MemberInterface member2) {
		return new ParcoursSimple(g).cheminLePlusCourt((Sommet) member1, (Sommet) member2).distance();
	}

	@Override
	public void setOtherNetwork(FacebookGhostNetwork f) {
		autreReseau = f;
	}
	
}
